<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntranceTestsSurvey extends Model
{
    use HasFactory;

    
    protected $table = 'entrance_tests_survey';
    protected $fillable = ['id_entranceTests','id_surveys'];
}

