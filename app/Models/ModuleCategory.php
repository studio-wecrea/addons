<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ModuleCategory extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "categories_modules";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'module_id',
        'category_id',
    ];

    /**
     * Get the categories that owns the module.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, "category_id")->withPivot('name');
    }

    /**
     * Get the modules associated with the category.
     */
    public function modules()
    {
        return $this->hasMany(Module::class, 'module_id');
    }


}
