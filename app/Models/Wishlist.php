<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Wishlist extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "wishlist";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
    
        'customer_id',
        'module_id'
    ];

    protected $attributes = [
        'customer_id' => null,
        'module_id' => null  
    ];
}
