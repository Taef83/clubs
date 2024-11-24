<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $primaryKey = 'feedback_id';
    protected $fillable = [
        'club_id',
        'student_id',
        'event_id',
        'rating_registering',
        'rating_venue',
        'rating_timing',
        'rating_organization',
        'rating_topic',
        'rating_overall',
        'worked_well',
        'improvements',
        'future_event_suggestions',
        'comment',
        'dateTime',
        'admin_id'
    ];
    public $timestamps = false;
    protected $table = 'feedback';

    // Relationship with Club
    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id', 'club_id');
    }

    // Relationship with Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    // Relationship with Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id');
    }

     // Relationship with Event
     public function event()
     {
         return $this->belongsTo(Event::class, 'event_id', 'event_id');
     }

    public function getIdAttribute()
    {
        return $this->feedback_id;
    }
}
