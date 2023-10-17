<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Notification extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "notifications";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'targetable_id',
        'targetable_type',
        'read_at'
    ];

    protected $attributes = [
        'title' => null,
        'description' => null
    ];

    /**
     * Get the parent targetable model (Customer or Version or Module).
     */
    public function targetable()
    {
        return $this->morphTo();
    }
}
