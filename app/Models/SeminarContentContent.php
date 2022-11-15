<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Base;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;
use Kirschbaum\PowerJoins\PowerJoins;

class SeminarContentContent extends BaseModel
{
    use HasFactory,SoftDeletes;
    protected $table = 'seminar_content_content';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = [];

    public function seminarContent()
    {
        return $this->belongsTo(SeminarContent::class);
    }

}