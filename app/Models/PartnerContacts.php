<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerContacts extends Model
{
    use HasFactory;

    protected $table = 'partner_contacts';
    protected $fillable = ['name', 'firstname', 'mail', 'tel', 'nameCompany', 'user_id'];
}
