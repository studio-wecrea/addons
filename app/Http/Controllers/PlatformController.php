<?php

namespace App\Http\Controllers;


use App\Http\Requests\Platform\StorePlatformRequest;
use App\Http\Requests\Platform\UpdatePlatformRequest;
use App\Models\Platform;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms= Platform::findAll();

        return view ('platforms.index')->with('platforms', $platforms);
    }

    public function create()
    {
        return view ('platforms.create');
    }

    public function store(StorePlatformRequest $request)
    {
        $vdata = $request->validated();
        
        $image = MediaService::upload($vdata['image']);
    
        $vdata['slug'] = Str::of($vdata['slug'])->slug('-');
    
        Platform::create([
            'name' => $vdata['name'],
            'description' => $vdata['description'],
            'image' => $image,
            'slug' => $vdata['slug']
        ]);
    
        return redirect()->route('admin.list')->with('success', 'New platform succesfully stored!');
        
    }
    
    public function edit($id)
    {
        $platform = Platform::findOrFail($id);
        return view ('platforms.edit')->with('platform', $platform);
    }
    
    public function update(UpdatePlatformRequest $request, $id)
    {
        $vdata = $request->validated();
        $platform = Platform::findOrFail($id);
        if (isset($vdata['image'])){
            Storage::delete($platform->image);
            $image_url = MediaService::upload($vdata['image']);
            $platform->image = $image_url;
        }
        $platform->fill($vdata);
        $platform->save();

        return redirect()->route('admin.list')->with('success', 'Platform successfully updated!');
    }

    public function show($id)
    {
        $platform = Platform::findOrFail($id);
        return view('platforms.show')->with('platform', $platform);
    }

    public function delete($id)
    {
        $platform = Platform::findOrFail($id);
        $platform->delete();
        return redirect()->route('admin.list')->with('success', 'Platform successfully deleted');
    }
}
