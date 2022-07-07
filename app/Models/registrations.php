<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registrations extends Model
{
    use HasFactory;

    protected $table = 'registrations';
    protected $fillable = ['dateRegistration', 'detailRegistration' ,'id_promos','id_registrationTypes' ];
}
