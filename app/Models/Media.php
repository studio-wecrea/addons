<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Media extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "medias";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'type',
        'location',
        'id_module'
    ];

    protected $attributes = [
        'name' => null,
        'type' => null,
        'location' => null
    ];

    /**
     * Get the module that owns the media.
     */
    public function moduleMedias()
    {
        return $this->belongsTo(Module::class, "id_module");
    }
}
