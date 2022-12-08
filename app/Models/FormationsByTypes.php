<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationsByTypes extends Model
{
    use HasFactory;

    protected $table = 'formations_by_types';
    protected $fillable = ['formationsTypes_id', 'formationsFormats_id'];
}
