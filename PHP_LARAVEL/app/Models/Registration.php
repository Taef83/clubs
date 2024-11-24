<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $primaryKey = 'registration_id';
    protected $fillable = [
        'student_id',
        'event_id',
        'registration_date',
        'activity_id',
        'role_type'
    ];
    public $timestamps = false;
    protected $table = 'registration';

    // Relationship with Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id', 'activity_id');
    }

    // Relationship with Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'event_id');
    }

    public function getIdAttribute()
    {
        return $this->registration_id;
    }
}
