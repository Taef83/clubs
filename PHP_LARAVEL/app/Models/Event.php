<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $primaryKey = 'event_id';
    protected $fillable = [
        'club_id',
        'event_name',
        'event_description',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'location'
    ];
    public $timestamps = false;
    protected $table = 'event';

    // Relationship with Club
    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id', 'club_id');
    }

    // Relationship with Registration
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'event_id', 'event_id');
    }

    // Relationship with Attendance
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'event_id', 'event_id');
    }

    // Relationship with Certificate
    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'event_id', 'event_id');
    }

    // Relationship with Feedback
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'event_id', 'event_id');
    }

    public function rating()
    {
        return round($this->feedbacks->avg('rating'), 2);
    }


    // Relationship with Activity
    public function activities()
    {
        return $this->hasMany(Activity::class, 'event_id', 'event_id');
    }

    public function getIdAttribute()
    {
        return $this->event_id;
    }
}
