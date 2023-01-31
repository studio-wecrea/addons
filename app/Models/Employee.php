<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "employees";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $appends = [
        'full_name'
    ];

    protected $fillable = [
        'role',
        'firstname',
        'lastname',
        'email',
        'password',
        'phone',
        'image',
        
    ];

    protected $hidden = [
        'password',
    ];

    protected $attributes = [
        'role' => 'admin',
        'phone' => null,
        
    ];

      /**
     * Get the support message record associated with the employee.
     */
    public function support()
    {
        return $this->hasMany(Support::class, 'id_support');
    }

     /**
     * Get all of the users notifications.
     */
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'targetable');
    }
}
