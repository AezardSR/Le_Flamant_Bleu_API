<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationTypes extends Model
{
    use HasFactory;

    protected $table = 'registration_types';
    protected $fillable = ['name'];
}
