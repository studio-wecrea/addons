<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Platform;
use App\Models\Purchase;
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
        $modules = Module::orderBy('name')->get();
        $platforms = Platform::orderBy('name')->get();
        return view ('orders.wishlist')->with(['customer'=> $customer, 'modules'=> $modules, 'platforms' => $platforms]);
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
}
