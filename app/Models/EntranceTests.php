<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntranceTests extends Model
{
    use HasFactory;
    
    protected $table = 'entrance_tests';
    protected $fillable = ['name','id_users'];
}

