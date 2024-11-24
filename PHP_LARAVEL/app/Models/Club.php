<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $primaryKey = 'club_id';
    protected $fillable = [
        'club_name',
        'mission_statement',
        'club_description',
        'location',
        'club_leader_id',
        'club_image'
    ];
    public $timestamps = false;
    protected $table = 'club';

    // Relationship with ClubLeader
    public function clubLeader()
    {
        return $this->belongsTo(ClubLeader::class, 'club_leader_id', 'club_leader_id');
    }

    // Relationship with Membership
    public function memberships()
    {
        return $this->hasMany(Membership::class, 'club_id', 'club_id');
    }

    // Relationship with Event
    public function events()
    {
        return $this->hasMany(Event::class, 'club_id', 'club_id');
    }

    // Relationship with Feedback
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'club_id', 'club_id');
    }

    // Relationship with Suggestion
    public function suggestions()
    {
        return $this->hasMany(Suggestion::class, 'club_id', 'club_id');
    }

    public function rating()
    {
        return round($this->feedbacks->avg('rating'), 2);
    }

    public function getIdAttribute()
    {
        return $this->club_id;
    }

    public function getAvatarAttribute()
    {
        $img = $this->club_image;
        if(!$img || !file_exists(public_path($img))){
            return url('logo.png');
        }
        return url($img);
    }
}
