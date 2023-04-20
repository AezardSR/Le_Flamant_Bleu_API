<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualites extends Model
{
    use HasFactory;

    protected $table = 'actualites';
    protected $fillable = ['title', 'content', 'publication_date', 'author'];
}
