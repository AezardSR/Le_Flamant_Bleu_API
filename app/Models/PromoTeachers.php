<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoTeachers extends Model
{
    use HasFactory;

    protected $table = 'promo_teachers';
    protected $fillable = ['teachers_id','promos_id'];
}
