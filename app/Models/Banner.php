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
    
    protected $appends = ['file_url'];


    // 確認此保單是否可被刪除
    public function getFileUrlAttribute() 
    {
        return asset('storage/'.$this->file_path);
    }
    

}