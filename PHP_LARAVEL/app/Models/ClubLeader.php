<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class ClubLeader extends Authenticatable
{
    protected $primaryKey = 'club_leader_id';
    protected $fillable = [
        'club_leader_name',
        'club_leader_email',
        'club_leader_password',
        'club_leader_image_profile',
        'club_leader_phone',
        'club_leader_admin_id',
        'club_leader_status',
    ];
    public $timestamps = false;
    protected $table = 'clubLeader';

    // Specify the authentication username field
    public function getAuthIdentifierName()
    {
        return 'club_leader_email'; // Change to your custom email field
    }

    // Specify the password field
    public function getAuthPassword()
    {
        return $this->club_leader_password; // Change to your custom password field
    }

    public function events()
    {
        return $this->hasManyThrough(
            Event::class,     // The related model (Event)
            Club::class,      // The intermediate model (Club)
            'club_leader_id', // Foreign key on the intermediate model (Club)
            'club_id',        // Foreign key on the final model (Event)
            'club_leader_id', // Local key on the parent model (ClubLeader)
            'club_id'         // Local key on the intermediate model (Club)
        );
    }

    // Relationship with Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'club_leader_admin_id', 'admin_id');
    }

    // Relationship with Club
    public function clubs()
    {
        return $this->hasMany(Club::class, 'club_leader_id', 'club_leader_id');
    }

    public function getIdAttribute()
    {
        return $this->club_leader_id;
    }

    public function getAvatarAttribute()
    {
        $img = $this->club_leader_image_profile;
        if(!$img || !file_exists(public_path($img))){
            return url('avatar.jpg');
        }
        return url($img);
    }
}
