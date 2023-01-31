<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications= Notification::findAll();

        return view ('notification.index')->with('notifications', $notifications);
    }

    public function create()
    {
        return view ('notification.create');
    }

    public function store()
    {
        return view ('notification.store');
    }
    
    
    public function edit()
    {
        return view ('notification.edit');
    }
    
    public function update()
    {
        return view ('notiifcation.index');
    }

    public function show($id)
    {
        $notification = Notification::findOrFail($id);
        return view ('notification.show')->with('notification', $notification);
    }

    public function delete()
    {
        return view ('customer.index');
    }
}
