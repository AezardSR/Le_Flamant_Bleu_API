<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulesCategories extends Model
{
    use HasFactory;

    protected $table = 'modules_categories';
    protected $fillable = ['id_categories', 'id_modules'];
}
