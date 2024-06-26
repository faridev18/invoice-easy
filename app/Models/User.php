<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'type_user',
        'email',
        'adresse',
        'code_postal',
        'ville',
        'pays',
        'telephone',
        'tva',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function factures()
    {
        return $this->hasMany(Facture::class, 'user_id');
    }


    public function isAdmin()
    {
        return $this->type_user === '4'; 
    }

    public function isClient()
    {
        return $this->type_user === '1'; 
    }

    public function isComptable()
    {
        return $this->type_user === '2';
    }

    public function isSecretaire()
    {
        return $this->type_user === '3';
    }
}
