<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promos extends Model
{
    use HasFactory;

    protected $table = 'promos';
    protected $fillable = ['name', 'startDate', 'endDate', 'duration','	formationsTypes_id ','formationsFormats_id'];

    public function promo_calendar()
    {
        return $this->hasOne(PromoCalendar::class);
    }

    public function promo_student()
    {
        return $this->hasOne(PromoStudents::class);
    }

    public function registrations()
    {
        return $this->hasOne(Registrations::class);
    }

    public function signatures()
    {
        return $this->hasOne(Signatures::class);
    }
}
