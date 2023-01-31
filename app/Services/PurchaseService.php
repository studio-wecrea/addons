<?php

namespace App\Services;

use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseService 
{
    public function getCustomerPurchase(){
        Purchase::where("purchases.customer_id","=",Auth::user()->id)
          ->join("modules","module.id","=","purchases.module_id")
          ->join("customers","modules.customer_id","=","customer.id")
          ->select('modules.module', DB::raw('count(*) as total'))
          ->groupBy('modules.customer')
          ->get();
    }
}