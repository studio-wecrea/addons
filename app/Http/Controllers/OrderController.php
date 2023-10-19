<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Platform;
use App\Models\Purchase;
use App\Models\Wishlist;
use App\Services\CountryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function cart() {
        $customer = Auth::guard('webcustomers')->user();
        $modules = Module::orderBy('name')->get();
        $platforms = Platform::orderBy('name')->get();
        return view ('orders.cart')->with(['customer'=> $customer, 'modules'=> $modules, 'platforms' => $platforms]);
    }
    
    public function shoppingCart() {
        $customer = Auth::guard('webcustomers')->user();
        $modules = Module::orderBy('name')->get();
        $platforms = Platform::orderBy('name')->get();
        return view ('orders.shopping-cart')->with(['customer'=> $customer, 'modules'=> $modules, 'platforms' => $platforms]);
    }

    public function wishlist() {
        $customer = Auth::guard('webcustomers')->user();
        $module = Module::orderBy('name')->get();
        $platforms = Platform::orderBy('name')->get();
        if (!empty($customer = Auth::guard('webcustomers')->user())){
            $customer = Auth::guard('webcustomers')->user();
            $wishlists = Wishlist::where('customer_id', '=', $customer->id)->get();
            $modules = Module::join('wishlist', function ($join){
                $join->on('modules.id', '=', 'wishlist.module_id');
            })->get();

            return view ('orders.wishlist')->with(['wishlists' => $wishlists, 'modules' => $modules, 'customer' => $customer]);
        }
        $modules = Module::join('wishlist', function ($join){
            $join->on('modules.id', '=', 'wishlist.module_id');
        })->get();

        return view('orders.wishlist')->with(['module' => $module, 'platforms' => $platforms, 'modules' => $modules, 'customer' => $customer]);
    }

    public function stripe() {
        $customer = Auth::guard('webcustomers')->user();
        $countries = CountryService::all();
        return view ('orders.stripe')->with(['customer'=> $customer, 'countries' => $countries]);
    }

    public function history() {
        $customer = Auth::guard('webcustomers')->user();
        $modules = Module::orderBy('name')->get();
        $platforms = Platform::orderBy('name')->get();
        $purchases = Purchase::where('customer_id', $customer->id)->orderBy('created_at', 'DESC')->get();
        return view ('orders.history')->with(['customer'=> $customer, 'modules'=> $modules, 'platforms' => $platforms, 'purchases' => $purchases]);
    }

    public function cancellations() {
        $customer = Auth::guard('webcustomers')->user();
        $purchases = Purchase::where('customer_id', $customer->id)->where('status', '=', 'unpaid')->orderBy('created_at', 'DESC')->get();
        return view ('orders.cancellations')->with(['customer'=>$customer, 'purchases'=>$purchases]);
    }

    public function confirmation(Request $request, $uniq_id)
    {
        dd("JE SUIS LA $uniq_id");

        $customer = Auth::guard('webcustomers')->user();
        $Purchase = Purchase::where("uniq_id", $uniq_id)->first();

        if(empty($Purchase)){
            abort(404);
        }

        if($Purchase->customer_id !== $customer->id){
            abort(403);
        }

        $Module = Module::find($Purchase->module_id);
        
        return view("orders.confirmation", compact("Purchase", "Module"));
    }
}
