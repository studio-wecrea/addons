<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Purchase extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "purchases";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;


    protected $fillable = [
        'status',
        'total_price',
        'session_id',
        'customer_id',
        'module_id',
        'reference',
        'uniq_id',
    ];

    protected $attributes = [
        //
       
    ];
}
