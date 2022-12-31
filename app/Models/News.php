<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Base;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;
use Kirschbaum\PowerJoins\PowerJoins;
use Carbon\Carbon;

class News extends BaseModel
{
    use HasFactory,SoftDeletes;
    protected $table = 'news';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = [];
    
    protected $appends = ['file_url','banner_file_url'];


    // 取得圖檔於Public資料夾的URL
    public function getFileUrlAttribute() 
    {
        return empty($this->file_path) ? null : asset('storage/'.$this->file_path);
    }

    // 取得圖檔於Public資料夾的URL
    public function getBannerFileUrlAttribute() 
    {
        return empty($this->banner_file_path) ? null : asset('storage/'.$this->banner_file_path);
    }
    
    // 取得圖檔於Public資料夾的URL
    public function getDateYmdAttribute() 
    {
        return Carbon::parse($this->created_at)->format('Y.m.d');
    }

    public function getStartedYmdAttribute()
    {
        return empty($this->started_at) ? null : Carbon::parse($this->started_at)->format('Y.m.d');
    }

    public function getEndedYmdAttribute()
    {
        return empty($this->ended_at) ? null : Carbon::parse($this->ended_at)->format('Y.m.d');
    }

    public function getIsPassAttribute()
    {
        return empty($this->ended_at) ? false : Carbon::parse($this->ended_at)->isPast();
    }
}