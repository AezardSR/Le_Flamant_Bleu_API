<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercices extends Model
{
    use HasFactory;

    protected $table = 'exercices';
    protected $fillable = ['name', 'content', 'image', 'file', 'parts_id'];

    public function part() {
        return $this->hasOne(Categories::class);
    }
}
