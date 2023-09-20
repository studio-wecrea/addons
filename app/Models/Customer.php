<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;


class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    protected $guard = 'webcustomers';
    protected $table = "customers";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $appends = [
        'full_name'
    ];

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'role',
        'address',
        'image',
        'password',
        
    ];

    protected $hidden = [
        'password',
    ];

    protected $attributes = [
        'role' => 'customer',
        'phone' => null,
        'image' => null,
        
    ];

    /**
     * Get the modules associated with the customer.
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'id_module');
    }

    /**
     * Get the review records associated with the customer.
     */
    public function review()
    {
        return $this->hasMany(Review::class, 'id_review');
    }

    /**
     * Get the invoices associated with the customer.
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'id_invoice');
    }

    /**
     * Get the support message record associated with the customer.
     */
    public function support()
    {
        return $this->hasMany(Support::class, 'id_support');
    }

    /**
     * Get the notifications associated with the customer.
     */

    public function ownedNotifications()
    {
        return $this->hasMany(Notification::class, 'id_customer');
    }
    /**
     * Get the purchases owned by the customer.
     */

    public function customerPurchases()
    {
        return $this->belongsToMany(Purchase::class, 'id_customer');
    }

    public function moduleWishlist()
    {
        return $this->belongsToMany(Wishlist::class, 'id_module');
    }
}
