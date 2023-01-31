<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Platform extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "platforms";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'created_at'
    ];

    protected $attributes = [
        'name' => null,
        'description' => null,
        'image' => null,
        'slug' => null,
    ];

     /**
     * Get the modules associated for the Platform.
     */
    public function modules()
    {
        return $this->hasMany(Module::class, 'id_module');
    }

     /**
     * Get the modules associated for the Platform.
     */
    public function categories()
    {
        return $this->hasMany(Category::class, 'id_category');
    }

    public function versions()
    {
        return $this->belongsToMany(Version::class, 'version_id')->withPivot('name');
    }

}
