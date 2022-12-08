<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsOffers extends Model
{
    use HasFactory;

    protected $table = 'jobs_offers';
    protected $fillable = ['name', 'dateOffers', 'description', 'link', 'user_id', 'partnerContacts_id'];
}
