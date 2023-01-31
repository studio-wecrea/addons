<?php

namespace App\Http\Controllers;

use App\Http\Requests\Version\StoreVersionRequest;
use App\Http\Requests\Version\UpdateVersionRequest;
use App\Models\Version;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function index()
    {
        $version= Version::findAll();

        return view ('version.index')->with('version', $version);
    }

    public function create()
    {
        return view ('version.create');
    }

    public function store(StoreVersionRequest $request)
    {
        $vdata = $request->validated();
        $version = new Version([$vdata]);
        $version->save();
        return view ('version.index')->with('success', 'Version sucessfully added!');
    }
    
    
    public function edit($id)
    {
        $version = Version::findOrFail($id);
        return view ('version.edit')->with('version', $version);
    }
    
    public function update(UpdateVersionRequest $request, $id)
    {
        $vdata = $request->validated();
        $version = Version::findOrFail($id);
        $version->fill($vdata);
        $version->save();
        return view ('version.index')->with('success', 'Version successfully updated!');
    }

    public function show($id)
    {
        $version = Version::findOrFail($id);
        return view ('version.show')->with('version', $version);
    }

    public function delete($id)
    {
        $version = Version::findOrFail($id);
        $version->delete();
        return view ('version.index')->with('success', 'Version successfully deleted!');
    }
}
