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
        'name',
        'email',
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

    ////////////////////////////////////adherant/////////////////////////////////////
    protected $table = 'users';
    // one to many between admin and user(adherant) 
    public function adherants(){
        return $this->hasMany(User::class,'admin_id');
    }

    
    // one to many between admin and feedback 
    public function feedbacks(){
        return $this->hasMany(Feedback::class,'admin_id')->where('isadmin','=',1);
    }

    ////////////////////////////////////admin/////////////////////////////////////
    
    //user has one admin
    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    // adherant can make many reclamations
    public function reclamations(){
        return $this->hasMany(Reclamation::class,'adherant_id');
    }

}
