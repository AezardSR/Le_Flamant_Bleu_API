<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anwers extends Model
{
    use HasFactory;

    protected $table = 'anwsers';
    protected $fillable = ['anwsers', 'id_users', 'id_questions'];
}
