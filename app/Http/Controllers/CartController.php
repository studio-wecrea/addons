<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Platform;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartContent = (new CartRepository())->content();
        $cartCount = (new CartRepository())->count();

        return response()->json([
            'cartContent' => $cartContent,
            'cartCount' => $cartCount
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = Module::where('id', $request->moduleId)->first();
        $platform = Platform::where('id', $request->platformId)->first();
        $count = (new CartRepository())->add($module, $platform);

        return response()->json([
            'count' => $count
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyModule($id)
    {
        (new CartRepository())->remove($id);
    }

    public function increase($id)
    {
        (new CartRepository())->increase($id);
    }

    public function decrease($id)
    {
        (new CartRepository())->decrease($id);
    }

    public function count()
    {
        $count = (new CartRepository())->count();

        return response()->json([
            'count' => $count
        ]);
    }
}
