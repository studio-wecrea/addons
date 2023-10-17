<?php

namespace App\Repositories;

use App\Models\Module;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistRepository
{
    public function add(Module $module)
    {
        $wish_list = app('wishlist');
    
            $wish_list->add(array(
                'id' => $module->id,
                'name' => $module->name,
                'price' => $module->price,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $module
            ));
        

        return $this->count();
    
    }

    public function content()
    {
        $wish_list = app('wishlist');
        return $wish_list->getContent();


    }

    public function count()
    {
        return $this->content()->sum('quantity');
    }

    public function remove($id)
    {
        $wish_list = app('wishlist');
    
        Wishlist::where('module_id',"=", $id)->delete();

        return $wish_list->remove($id);
    }

    public function total() 
    {
        $wish_list = app('wishlist');
        return $wish_list->getTotal();
    }

    public function jsonOrderItems()
    {
        $this
            ->content()
            ->map(function($item) {
                return [
                    'name' => $item->name,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ];
            })
            ->toJson();
    }

    public function clear()
    {
        $wish_list = app('wishlist');
        $wish_list->clear();
    }
}