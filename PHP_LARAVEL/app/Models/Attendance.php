<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $primaryKey = 'attendance_id';
    protected $fillable = [
        'event_id', 
        'student_id', 
        'attended_time', 
        'attendance_status'
    ];
    public $timestamps = false;
    protected $table = 'attendance';

    // Relationship with Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'event_id');
    }

    // Relationship with Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function getIdAttribute()
    {
        return $this->attendance_id;    
    }
}
