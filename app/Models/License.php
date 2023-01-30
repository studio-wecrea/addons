<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class License extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "licenses";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'site_id',
        'domain',
        'expiration_date',
        'id_module',
        'id_customer',
        'created_at'
    ];

    protected $attributes = [
        'site_id' => null,
        'domain' => null,
        'expiration_date' => null
    ];

    /**
     * Get the license that owns the module.
     */

    public function moduleLicense()
    {
        return $this->belongsTo(Module::class, "id_module");
    }
    /**
     * Get the license that is associated with the invoice.
     */

    public function invoice()
    {
        return $this->hasOne(Invoice::class, "inovice_id");
    }

}
