<?php

namespace App\Services;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\Calendar_tw;

class BaseService
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(

    ) {

    }

    //確認目前是否為上班時間
    public function isWorkTime( $time = null ){

        $startTime      = Carbon::createFromFormat('H:i a', '09:00 AM');
        $endTime        = Carbon::createFromFormat('H:i a', '06:00 PM');
        $currentTime    = $time ?? Carbon::now();
        
        if( $currentTime->between($startTime, $endTime, true) && $this->isWorkDate($currentTime) ){
            return true;
        }else{
            return false;
        }
        
    } 

    //確認是否為上班日，可至https://data.gov.tw/dataset/14718，或於https://data.gov.tw 搜尋中華民國政府行政機關辦公日曆表，並匯入Json檔
    public function isWorkDate( $date = null ){
        if($date == null){
            $date = Carbon::now();
        }
        $calendar_date = Calendar_tw::where("date",$date->toDateString())->first();

        if($calendar_date == null){
            //如果尚未匯入導致無資訊，則回傳null
            return null;
        }else if($calendar_date->isHoliday){
            return false;
        }else{
            return true;
        }
    } 

    public function applyFilterQuery($query, $params, $dataAddDot = false)
    {
        $mainTableName = $query->getModel()->getTable();
        $filters = json_decode($params['filter'],true);
        $sorts   = json_decode($params['sort'],  true);
        $size    = isset($params['size']) ? ($params['size']=="true" ? 9999999999 :  intval($params['size']) ) : 10 ;
        $page    = isset($params['page']) ? intval($params['page']) :  1 ;

        foreach ($filters as $key => $filter) {
            $relation = null;
            if (stripos($filter['field'], '.')) {
                $explode = explode('.', $filter['field']);
                $filter['field'] = array_pop($explode);
                $relation = implode('.', $explode);
            }

            if ( !is_null($relation) ) {
                $query = $this->recursiveWhereHas($query, $relation, $filter['field'], $filter['type'], $filter['value']);
            } else {
                $query = $this->addQuery($query, $filter['field'], $filter['type'], $filter['value']);
            }
        }
        
        foreach ($sorts as $key => $sort) {
            if($sort['dir'] === "none"){
                continue;
            }
            if(isset($sort['type']) && $sort['type']=='Raw'){
                $query = $query->orderByRaw($sort['field']." ".$sort['dir']);
            }else if(stripos($sort['field'], '.')) {
                $query->orderByPowerJoins($sort['field'],$sort['dir']);
            }else{
                $query = $query->orderBy($sort['field'], $sort['dir']);
            }
        }

        $paginator = $query->paginate($size, ['*'], 'page', $page);
        
        if($dataAddDot===true){
            $paginator->getCollection()->transform(function ($value) {
                return $this->mergeRelation($value->toArray());
            });
        }

        return $paginator;
    }

    private function recursiveWhereHas($query, $relation, $field, $type, $value)
    {
        $explode  = explode('.', $relation);
        $relation = array_shift($explode);
        $implode  = implode('.', $explode);

        if ($relation) {
            $query = $query->whereHas($relation, function ($query) use ($relation, $implode, $field, $type, $value) {
                $query = $this->recursiveWhereHas($query, $implode, $field, $type, $value);
            });
        } else {
            $query = $this->addQuery($query, $field, $type, $value);
        }

        return $query;
    }

    private function addQuery($query, $field, $type, $value)
    {
        if($value === "無"){
            $query->where(function ($query) use ($field, $type, $value) {
                if($type==='=' || $type==='like'){
                    $query->whereNull($field)
                        ->orWhere($field, '')
                        ->orWhere($field, '無');
                }else if($type==='!='){
                    $query->whereNotNull($field)
                        ->where($field, $type, '')
                        ->where($field, $type, '無');
                }
            });
        }else if($type === 'function'){
            $query->whereBetween($field, [$value['start'],$value['end']]);
        }else if($type === 'like'){
            $value = '"%'.$value.'%"';
            $query->whereRaw($field." ".$type." ".$value);
        }else{
            $query->where($field, $type, $value);
        }

        return $query;
    }

    private function mergeRelation($array, $prefix = '') {
        $return = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $return = array_merge($return, $this->mergeRelation($value, $prefix . $key . '.'));
            } else {
                $return[$prefix . $key] = $value;
            }
        }
        return $return;
    }

}


