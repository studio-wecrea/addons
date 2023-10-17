<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Support extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "support";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'title',
        'message_id',
        'description',
        'id_customer',
        'id_employee',
        'id_module',
        'id_category',
        'message_datetime'
    ];

    protected $attributes = [
        'title' => null,
        'description' => null,
    ];

    /**
     * Get the support message that is associated with the customer.
     */

    public function customerSupport()
    {
        return $this->belongsTo(Customer::class, "id_customer");
    }

    /**
     * Get the support message that is associated with the employee.
     */

    public function employeeSupport()
    {
        return $this->belongsTo(Employee::class, "id_employee");
    }
}
