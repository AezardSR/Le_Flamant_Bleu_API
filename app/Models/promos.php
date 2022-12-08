<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promos extends Model
{
    use HasFactory;

    protected $table = 'promos';
    protected $fillable = ['name', 'startDate', 'endDate', 'duration','	formationsTypes_id ','formationsFormats_id'];
}
