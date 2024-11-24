<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $primaryKey = 'activity_id';
    protected $fillable = [
        'event_id',
        'number_participants',
        'activity_name',
        'activity_description'
    ];
    public $timestamps = false;
    protected $table = 'activity';

    // Relationship with Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'event_id');
    }
    // Relationship with Registration
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'activity_id', 'activity_id');
    }

    // Accessor for registration count
    public function getRegistrationsCountAttribute()
    {
        return $this->registrations()->count();
    }
    public function getIdAttribute()
    {
        return $this->activity_id;
    }
}
