<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCalendar extends Model
{
    use HasFactory;

    protected $table = 'promo_calendar';
    protected $fillable = ['startDate','endDate','promos_id'];
}
