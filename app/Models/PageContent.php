<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Base;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;
use Kirschbaum\PowerJoins\PowerJoins;

class PageContent extends BaseModel
{
    use HasFactory,SoftDeletes;
    protected $table = 'page_content';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = [];
    
    protected $appends = ['banner_file_url'];


    // 取得圖檔於Public資料夾的URL
    public function getBannerFileUrlAttribute() 
    {
        return empty($this->banner_file_path) ? null : asset('storage/'.$this->banner_file_path);
    }
    

}