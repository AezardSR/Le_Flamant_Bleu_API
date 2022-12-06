<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulesClass extends Model
{
    use HasFactory;

    protected $table = 'modules_class';
    protected $fillable = ['classes_id', 'modules_id'];
}
