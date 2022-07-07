<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationsByTypes extends Model
{
    use HasFactory;

    protected $table = 'formationsByTypes';
    protected $fillable = ['id_formationsTypes', 'id_formationsFormats'];
}
