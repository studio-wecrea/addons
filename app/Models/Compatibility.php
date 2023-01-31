<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Compatibility extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "compatibilities";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;


    protected $fillable = [
        'name',
        
    ];

    protected $attributes = [
        'name' => null,
       
    ];
}
