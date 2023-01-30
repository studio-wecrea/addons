<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Review extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "reviews";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'rating',
        'id_customer',
        'created_at'
    ];

    protected $attributes = [
        'title' => null,
        'description' => null,
        'rating' => 5,
    ];

     /**
     * Get the review that is associated with the customer.
     */

    public function customerReview()
    {
        return $this->belongsTo(Customer::class, "id_customer");
    }

    /**
     * Get the module that owns the review.
     */
    public function moduleReview()
    {
        return $this->belongsTo(Module::class, "id_module");
    }
}
