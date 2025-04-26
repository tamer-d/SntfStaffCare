<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function medecin()
    {
        return $this->hasOne(Medecin::class);
    }
    
    public function employe()
    {
        return $this->hasOne(Employe::class);
    }
    
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    

    protected $fillable = [
        'nom',
        'prenom',
        'nomConjoint',
        'email',
        'numTelephone',
        'password',
        'dateNaissance',
        'lieuNaissance',
        'wilayaNaissance',
        'adresse',
        'wilaya',
        'sexe',
        'statut',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

}
