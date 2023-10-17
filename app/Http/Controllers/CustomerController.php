<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Services\CountryService;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index()
    {
        $customers= Customer::findAll();

        return view ('customers.index')->with('customers', $customers);
    }

    public function create()
    {
        
        return view ('customers.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        $password = 'Azerty@123';
        $vdata = $request->validated();
        $image = MediaService::upload($vdata['image']);

        Customer::create([
            'firstname' => $vdata['firstname'],
            'lastname' => $vdata['lastname'],
            'email' => $vdata['email'],
            'phone' => $vdata['phone'],
            'role' => $vdata['role'],
            'address' => $vdata['address'],
            'image' => $image,
            'password' => Hash::make($password)
        ]);
    
        return redirect()->route('admin.list')->with('success', 'Customer sucessfully added!');
    }
    
    
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view ('customers.edit')->with('customer', $customer);
    }
    
    public function update(UpdateCustomerRequest $request, $id)
    {
        $vdata = $request->validated();
        $customer = Customer::findOrFail($id);
        if (isset($vdata['image'])){
            Storage::delete($customer->image);
            $image_url = MediaService::upload($vdata['image']);
            $customer->image = $image_url;
        }

        $customer->firstname = $vdata['firstname'];
        $customer->lastname = $vdata['lastname'];
        $customer->email = $vdata['email'];
        $customer->phone = $vdata['phone'];
        $customer->address = $vdata['address'];
        $customer->save();

        return view ('admin.list')->with('success', 'Customer successfully updated!');
    }

    public function profileEdit() {
        $user = Auth::guard('webcustomers')->user();
            return view ('customers.profile-edit')->with('user', $user);
        
    }

    public function profileUpdate(UpdateProfileRequest $request, $id) {
        $vdata = $request->validated();
        $user = Auth::guard('webcustomers')->user(); 
        $customer = Customer::findOrFail($id);

        if($user->id === $customer->id){
            if (isset($vdata['image'])) {
                if(isset($customer->image)){
                Storage::delete($customer->image);
                }
                $image_url = MediaService::upload($vdata['image']);
                $customer->image = $image_url;
            }
            if(!empty($customer->firstname)|| (!empty($customer->lastname) || (!empty($customer->email)))){
                $user->firstname = $customer->firstname;
                $user->lastname = $customer->lastname;
                $user->email = $customer->email;
            }
            $customer->firstname = $vdata['firstname'];
            $customer->lastname = $vdata['lastname'];
            $customer->phone = $vdata['phone'];
            $customer->save();
        }
            

        return view ('customers.profile-edit')->with(['customer'=>$customer, 'user' => $user]);
    }

    public function address(){
        $user = Auth::guard('webcustomers')->user();
        $countries = CountryService::all();
        return view ('customers.address')->with(['user' => $user, 'countries' => $countries]);
    }

    public function password(){
        $user = Auth::guard('webcustomers')->user();
        return view ('customers.password')->with(['user' => $user]);
    }

    public function show($id)
    { 
        $customer = Customer::findOrFail($id);
        return view('customers.show')->with('customer', $customer);
    }

    public function account()
    { 
        $customer = Auth::guard('webcustomers')->user();
        return view('customers.account')->with('customer', $customer);
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return view ('admin.list')->with('success', 'Customer was successfully deleted!');
    }
}
