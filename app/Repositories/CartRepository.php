<?php

namespace App\Repositories;

use App\Models\Module;
use App\Models\Platform;
use Illuminate\Support\Facades\Auth;

class CartRepository
{
    public function add(Module $module, Platform $platform)
    {
        \Cart::add(array(
            'id' => $module->id,
            'name' => $module->name,
            'price' => $module->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $module, $platform
        ));

        return $this->count();
    }

    public function content()
    {
        return \Cart::getContent();

    }

    public function count()
    {
        return $this->content()->sum('quantity');
    }

    public function remove($id)
    {
        return \Cart::remove($id);
    }
}