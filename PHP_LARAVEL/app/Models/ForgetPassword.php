<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForgetPassword extends Model
{
    protected $primaryKey = 'forget_password_id';
    protected $fillable = [
        'email', 
        'code', 
        'is_used', 
    ];
    public $timestamps = false;
    protected $table = 'forget_password';


    public function getIdAttribute()
    {
        return $this->forget_password_id;    
    }
}
