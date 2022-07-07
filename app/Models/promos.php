<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promos extends Model
{
    use HasFactory;

    protected $table = 'promos';
    protected $fillable = ['name', 'startDate', 'endDate', 'duration','	id_formationsTypes ','id_formationsFormats'];
}
