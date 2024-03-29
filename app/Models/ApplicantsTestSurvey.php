<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantsTestSurvey extends Model
{
    use HasFactory;

    
    protected $table = 'applicants_test_survey';
    protected $fillable = ['name','firstname','dateSurvey','mail','entranceTests_id','user_id','promos_id'];
}

