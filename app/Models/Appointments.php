<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $fillable = ['titleDetails', 'descriptionDetails', 'dateDetails', 'receiver_id', 'create_id', 'appointments_types_id'];
}
