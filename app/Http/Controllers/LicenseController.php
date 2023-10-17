<?php

namespace App\Http\Controllers;

use App\Http\Requests\License\StoreLicenseRequest;
use App\Http\Requests\License\UpdateLicenseRequest;
use App\Models\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index()
    {
        $licenses= License::findAll();

        return view ('license.index')->with('licenses', $licenses);
    }

    public function create()
    {
        return view ('license.create');
    }

    public function store(StoreLicenseRequest $request)
    {
        $vdata = $request->validated();
        $license = new License([$vdata]);
        $license->save();
        return view ('license.index')->with('success', 'New license successfully added!');
    }
    
    public function edit($id)
    {
        $license = License::findOrFail($id);
        return view ('license.edit')->with('license', $license);
    }
    
    public function update(UpdateLicenseRequest $request, $id)
    {
        $vdata = $request->validated();
        $license = License::findOrFail($id);
        $license->fill($vdata);
        $license->save();
        return view ('license.index')->with('success', 'License successfully updated!');
    }

    public function show($id)
    {
        $license = License::findOrFail($id);
        return view ('license.show')->with('license', $license);
    }

    public function destroy($id)
    {
        $license = License::findOrFail($id);
        $license->delete();
        return view ('license.index')->with('success', 'License successfully deleted!');
    }
}
