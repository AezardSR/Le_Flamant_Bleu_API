<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrations extends Model
{
    use HasFactory;

    protected $table = 'registrations';
    protected $fillable = ['dateRegistration', 'detailRegistration' ,'promos_id','registrationTypes_id' ];
}
