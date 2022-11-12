<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DateTimeInterface;
use Kirschbaum\PowerJoins\PowerJoins;

class Admin extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'admin';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $hidden = ['account','password'];
    protected $guarded = [];

}