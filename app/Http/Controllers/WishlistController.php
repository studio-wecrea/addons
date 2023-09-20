<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Platform;
use App\Models\Wishlist;
use App\Repositories\WishlistRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlistContent = (new WishlistRepository())->content();
        $wishlistCount = (new WishlistRepository())->count();

        return response()->json([
            'wishlistContent' => $wishlistContent,
            'wishlistCount' => $wishlistCount
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

        $customer = Auth::guard('webcustomers')->user();
        $module = Module::where('id', $request->moduleId)->first();
        $platform = Platform::where('id', $request->platformId)->first();
        $count = (new WishlistRepository())->add($module, $platform);
        
        if(Wishlist::where('module_id', $module->id)->where('customer_id', $customer->id)->doesntExist())
        {
            $wishlist = new Wishlist();
            $wishlist->customer_id = $customer->id;
            $wishlist->module_id = $module->id;
            $wishlist->save();
        }
    


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
        
        // $customer = Auth::guard('webcustomers')->user();
        // $wishlists = Wishlist::findOfail($id)->where('customer_id', '=', $customer->id);
        // $module = Module::join('wishlist', function ($join){
        //     $join->on('modules.id', '=', 'wishlist.module_id');
        // })->get();

        // return view('orders.wishlist')->with(['wishlists'=> $wishlists, 'module' => $module]);
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
        (new WishlistRepository())->remove($id);
    }

    public function count()
    {
        $count = (new WishlistRepository())->count();

        return response()->json([
            'count' => $count
        ]);
    }
}
