<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantsAnswers extends Model
{
    use HasFactory;

    
    protected $table = 'applicants_anwsers';
    protected $fillable = ['answer','id_surveyAnswers','id_applicantsTestSurvey'];
}

