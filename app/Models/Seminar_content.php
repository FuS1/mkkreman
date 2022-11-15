<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Base;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;
use Kirschbaum\PowerJoins\PowerJoins;

class Seminar_content extends BaseModel
{
    use HasFactory,SoftDeletes;
    protected $table = 'seminar_content';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = [];

    public function seminar_content_content()
    {
        return $this->hasMany(Seminar_content_content::class);
    }

}