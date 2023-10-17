<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Module;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index() {

        $user = Auth::guard('webcustomers')->user();
        return view('admin.dashboard') ->with(['user' => $user]);;
    }
    public function list() {

        $user = Auth::guard('webcustomers')->user();
        $modules = Module::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $platforms = Platform::orderBy('name')->get();
        $customers = Customer::orderBy('lastname')->get();

        return view('admin.list')
                ->with(['categories' => $categories,
                        'modules' => $modules,
                        'platforms' => $platforms,
                        'customers' => $customers,
                        'user' => $user,
            ]);
    
    }

    
}
