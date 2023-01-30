<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        $support= Support::findAll();

        return view ('support.index')->with('support', $support);
    }

    public function create()
    {
        return view ('support.create');
    }

    public function store()
    {
        return view ('support.store');
    }
    
    
    public function edit()
    {
        return view ('support.edit');
    }
    
    public function update()
    {
        return view ('support.index');
    }

    public function show($id)
    {
        $support = Support::findOrFail($id);
        return view ('support.show')->with('support', $support);
    }

    public function delete()
    {
        return view ('support.index');
    }
}
