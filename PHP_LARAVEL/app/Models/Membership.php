<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $primaryKey = 'membership_id';
    protected $fillable = [
        'club_id', 
        'student_id', 
        'role_type', 
        'joined_at', 
        'status'
    ];
    public $timestamps = false;
    protected $table = 'membership';

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
        return $this->membership_id;    
    }
}
