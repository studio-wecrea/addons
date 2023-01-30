<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Version extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Get the notification associated for the version update of the module.
     */

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'targetable');
    }

     /**
     * Get the module the platform associated with the version of the module.
     */

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'platform_id')->withPivot('name');
    }

     /**
     * Get the module that owns the version.
     */
    public function moduleVersion()
    {
        return $this->belongsTo(Module::class, "id_module");
    }
}
