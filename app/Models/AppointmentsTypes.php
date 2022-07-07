<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentsTypes extends Model
{
    use HasFactory;

    protected $table = 'appointments_types';
    protected $fillable = ['name'];
}
