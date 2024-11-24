<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $primaryKey = 'student_id';
    protected $fillable = [
        'student_name',
        'student_email',
        'student_password',
        'image_profile',
        'student_phone',
        'student_major',
        'student_skills',
        'academic_number'
    ];
    public $timestamps = false;
    protected $table = 'student';

    // Specify the authentication username field
    public function getAuthIdentifierName()
    {
        return 'student_email'; // Change to your custom email field
    }

    // Specify the password field
    public function getAuthPassword()
    {
        return $this->student_password; // Change to your custom password field
    }

    // Relationship with Membership
    public function memberships()
    {
        return $this->hasMany(Membership::class, 'student_id', 'student_id');
    }

    // Relationship with Registration
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'student_id', 'student_id');
    }

    // Relationship with Attendance
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id', 'student_id');
    }

    // Relationship with Certificate
    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'student_id', 'student_id');
    }

    // Relationship with Feedback
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'student_id', 'student_id');
    }

    // Relationship with Suggestion
    public function suggestions()
    {
        return $this->hasMany(Suggestion::class, 'student_id', 'student_id');
    }

    public function getIdAttribute()
    {
        return $this->student_id;
    }

    public function getAvatarAttribute()
    {
        $img = $this->image_profile;
        if(!$img || !file_exists(public_path($img))){
            return url('avatar.jpg');
        }
        return url($img);
    }
}
