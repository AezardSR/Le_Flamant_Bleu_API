<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContacts extends Model
{
    use HasFactory;

    protected $table = 'emergency_contacts';
    protected $fillable = ['name', 'firstname', 'tel', 'id_users'];
}
