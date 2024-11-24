<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'admin_name', 
        'admin_email', 
        'admin_password', 
        'admin_phone'
    ];
    public $timestamps = false;
    protected $table = 'admin';

     // Specify the authentication username field
     public function getAuthIdentifierName()
     {
         return 'admin_email'; // Change to your custom email field
     }
 
     // Specify the password field
     public function getAuthPassword()
     {
         return $this->admin_password; // Change to your custom password field
     }

    // Relationship with ClubLeader
    public function clubLeaders()
    {
        return $this->hasMany(ClubLeader::class, 'club_leader_admin_id', 'admin_id');
    }

    // Relationship with Feedback
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'admin_id', 'admin_id');
    }

    public function getIdAttribute()
    {
        return $this->admin_id;    
    }
}
