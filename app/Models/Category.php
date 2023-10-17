<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Category extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "categories";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;


    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    protected $attributes = [
        'name' => null,
        'description' => null,
        'image' => null,
    ];

     /**
     * Get the platform that owns the category.
     */
    public function categoryPlatform()
    {
        return $this->belongsToMany(Platform::class, "id_platform")->withPivot('name');
    }



    public function modules() 
    {
        return $this->belongsToMany(Module::class, 'categories_modules', 'category_id', 'module_id');
    }
}
