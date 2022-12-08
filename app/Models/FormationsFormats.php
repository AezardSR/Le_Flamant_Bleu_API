<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationsFormats extends Model
{
    use HasFactory;

    protected $table = 'formations_formats';
    protected $fillable = ['name'];
}
