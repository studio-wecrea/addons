<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Module extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "modules";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;


    protected $fillable = [
        'name',
        'description',
        'nb_download',
        'nb_active_installation',
        'price',
        'original_price',
        'tags',
        'image',
        'video',
        'file',
        'platform_id'
    ];

    protected $attributes = [
        'name' => null,
        'description' => null,
        'nb_downloads' => 0,
        'nb_active_installations' => 0,
        'tags' => null,
        'image' => null,
        'video' => null,
        'file' => null,
        
    ];

    /**
     * Get the platform that owns the module.
     */
    public function modulePlatform()
    {
        return $this->belongsTo(Platform::class, "id_platform");
    }

    public function platforms()
    {
        return $this->belongsTo(Platform::class, "platform_id");
    }
    

    public function categories() 
    {
        return $this->belongsToMany(Category::class, 'categories_modules', 'module_id', 'category_id');
    }
    /**
     * Get the category that owns the module.
     */
    public function moduleCategory()
    {
        return $this->belongsToMany(Category::class, "id_category")->withPivot('name');
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class, "id_customer");
    }

    public function customerWishlist()
    {
        return $this->belongsToMany(Wishlist::class, "id_customer");
    }

    /**
     * Get the license record associated with the module.
     */
    public function license()
    {
        return $this->hasOne(License::class,'id_license');
    }

    /**
     * Get the medias associated for the module.
     */
    public function medias()
    {
        return $this->hasMany(Media::class, 'id_media');
    }


    /**
     * Get the reviews associated for the module.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_review');
    }

    /**
     * Get the versions associated for the module.
     */
    public function versions()
    {
        return $this->hasMany(Version::class, 'id_version');
    }

    /**
     * Get the notification associated for the module.
     */

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'targetable');
    }
    /**
     * Get the invoices associated for the module.
     */

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'invoice_id');
    }

    public function getFormattedPriceAttribute()
    {
        return str_replace('.', ',', $this->price / 100) . ' €';
    }


}
