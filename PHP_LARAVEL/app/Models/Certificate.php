<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $primaryKey = 'certificate_id';
    protected $fillable = [
        'student_id',
        'event_id',
        'issue_date',
        'certificate_description'
    ];
    public $timestamps = false;
    protected $table = 'certificate';

    // Relationship with Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    // Relationship with Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'event_id');
    }

    public function getIdAttribute()
    {
        return $this->certificate_id;
    }
}
