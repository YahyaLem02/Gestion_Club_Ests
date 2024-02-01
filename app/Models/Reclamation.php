<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    protected $primaryKey = 'NumReclamation';
    public $timestamps = false;
    // reclamation has one adherant
    public function adherant(){
        return $this->belongsTo(User::class);
    }

    // reclamation has many feedbacks 
    public function feedbacks(){
        return $this->hasMany(Feedback::class,'reclamation_id');
    }

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }
}
