<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('lastname')->get();

        return view ('employees.index')->with('employees', $employees);
    }

    public function create()
    {
        return view ('employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $password = 'Azerty@123';
        $vdata = $request->validated();
        $image = MediaService::upload($vdata['image']);

        Employee::create([
            'firstname' => $vdata['firstname'],
            'lastname' => $vdata['lastname'],
            'email' => $vdata['email'],
            'phone' => $vdata['phone'],
            'role' => $vdata['role'],
            'image' => $image,
            'password' => Hash::make($password)
        ]);
    
        return redirect()->route('admin.list')->with('success', 'Employee sucessfully added!');
    }
    
    
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view ('employees.edit')->with('employee', $employee);
    }
    
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $vdata = $request->validated();
        $employee = Employee::findOrFail($id);

        if (isset($vdata['image'])){
            Storage::delete($employee->image);
            $image_url = MediaService::upload($vdata['image']);
            $employee->image = $image_url;
        }
        
        $employee->firstname = $vdata['firstname'];
        $employee->lastname = $vdata['lastname'];
        $employee->email = $vdata['email'];
        $employee->phone = $vdata['phone'];
        $employee->role = $vdata['role'];
        $employee->save();
        return view ('employees.index')->with('success', 'Employee successfully updated!');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view ('employees.show')->with('employee', $employee);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return view ('employees.index')->with('success', 'Employee successfully deleted!');
    }
}
