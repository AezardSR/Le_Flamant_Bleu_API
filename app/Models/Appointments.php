<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $fillable = ['titleDetails', 'descriptionDeatils', 'dateDetails', 'id_receiver', 'id_create', 'id_appointments_types'];
}
