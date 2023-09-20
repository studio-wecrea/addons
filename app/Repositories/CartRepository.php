<?php

namespace App\Repositories;

use App\Models\Module;
use Illuminate\Support\Facades\Auth;

class CartRepository
{
    public function add(Module $module)
    {
        \Darryldecode\Cart\Facades\CartFacade::add(array(
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
        return \Darryldecode\Cart\Facades\CartFacade::getContent();

    }

    public function increase($id) 
    {
        \Darryldecode\Cart\Facades\CartFacade::update($id, [
            'quantity' => +1
        ]);
    }

    public function decrease($id) 
    {
        $item = \Darryldecode\Cart\Facades\CartFacade::get($id);

        if ($item->quantity === 1) {
            $this->remove($id);
            return;
        }

        \Darryldecode\Cart\Facades\CartFacade::update($id, [
            'quantity' => -1
        ]);
    }

    public function count()
    {
        return $this->content()->sum('quantity');
    }

    public function remove($id)
    {
        return \Darryldecode\Cart\Facades\CartFacade::remove($id);
    }

    public function total() 
    {
        return \Darryldecode\Cart\Facades\CartFacade::getTotal();
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
        \Darryldecode\Cart\Facades\CartFacade::clear();
    }
}