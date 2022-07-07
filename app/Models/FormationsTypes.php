<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationsTypes extends Model
{
    use HasFactory;

    protected $table = 'formationsTypes';
    protected $fillable = ['name'];

}
