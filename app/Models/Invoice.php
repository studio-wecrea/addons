<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Invoice extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "invoices";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'id_customer',
        'id_module'
    ];

    protected $attributes = [
        'title' => null,
        'description' => null  
    ];

    /**
     * Get the customer that owns the invoice.
     */
    public function customerInvoice()
    {
        return $this->belongsTo(Customer::class, "id_customer");
    }
    /**
     * Get the module that owns the invoice.
     */
    public function moduleInvoice()
    {
        return $this->belongsTo(Module::class, "id_module");
    }
    /**
     * Get the license that owns the invoice.
     */
    public function licenseInvoice()
    {
        return $this->belongsTo(License::class, "id_license");
    }
}
