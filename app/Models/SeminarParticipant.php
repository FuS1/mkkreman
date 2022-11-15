<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Base;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;
use Kirschbaum\PowerJoins\PowerJoins;

class SeminarParticipant extends BaseModel
{
    use HasFactory,SoftDeletes;
    protected $table = 'seminar_participant';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = [];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

}