<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('categories.create');
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show')->with('category', $category);
    }

    public function store(StoreCategoryRequest $request)
    {
        $vdata = $request->validated();
        $image = MediaService::upload($vdata['image']);
        
        Category::create([
            'name' => $vdata['name'],
            'description' => $vdata['description'],
            'image' => $image
        ]);
       
        return redirect()->route('admin.list')->with('success', 'Category successfully added!');
    }
    
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view ('categories.edit')->with('category', $category);
    }
    
    public function update(UpdateCategoryRequest $request, $id)
    {
        $vdata = $request->validated();
        $category = Category::findOrFail($id);
        if (isset($vdata['image'])){
            Storage::delete($category->image);
            $image_url = MediaService::upload($vdata['image']);
            $category->image = $image_url;
        }
        $category->name = $vdata['name'];
        $category->description = $vdata['description'];
        $category->save();
    
        return redirect()->route('admin.list')->with('Category successfully updated');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return view ('categories.index')->with('Category succesfully deleted!');
    }
}
