<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Base;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;
use Kirschbaum\PowerJoins\PowerJoins;

class SystemVariable extends BaseModel
{
    use HasFactory,SoftDeletes;
    protected $table = 'system_variable';
    protected $primaryKey = 'field';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];
}