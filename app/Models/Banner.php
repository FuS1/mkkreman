<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Base;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;
use Kirschbaum\PowerJoins\PowerJoins;

class Banner extends BaseModel
{
    use HasFactory,SoftDeletes;
    protected $table = 'banner';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = [];
    
    protected $appends = ['file_url','mobile_file_url'];


    // 取得圖檔於Public資料夾的URL
    public function getFileUrlAttribute() 
    {
        return empty($this->file_path) ? null : asset('storage/'.$this->file_path);
    }
    
    // 取得圖檔於Public資料夾的URL
    public function getMobileFileUrlAttribute() 
    {
        return empty($this->mobile_file_path) ? null : asset('storage/'.$this->mobile_file_path);
    }

}