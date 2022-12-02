<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;



class Users extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *@var array
     *
     */
    protected $table = 'users';
    protected $fillable = ['name','firstname','birthdate','mail','tel','password','adress','city','zipCode','roles_id', 'types_id'];

    public function roleUser(){
        return $this->hasOne(Roles::class);
    }    
    public function typeUser(){
        return $this->hasOne(Types::class);
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
