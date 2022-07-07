<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoStudents extends Model
{
    use HasFactory;

    protected $table = 'promo_students';
    protected $fillable = ['id_students','id_promos'];
}
