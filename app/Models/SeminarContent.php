<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Base;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;
use Kirschbaum\PowerJoins\PowerJoins;

class SeminarContent extends BaseModel
{
    use HasFactory,SoftDeletes;
    protected $table = 'seminar_content';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = [];

    public function seminarContentContent()
    {
        return $this->hasMany(SeminarContentContent::class);
    }

}