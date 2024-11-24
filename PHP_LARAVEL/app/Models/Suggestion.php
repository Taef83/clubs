<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $primaryKey = 'suggestion_id';
    protected $fillable = [
        'club_id', 
        'student_id', 
        'content', 
        'sent_time'
    ];
    public $timestamps = false;
    protected $table = 'suggestion';

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

    public function getIdAttribute()
    {
        return $this->suggestion_id;    
    }
}
