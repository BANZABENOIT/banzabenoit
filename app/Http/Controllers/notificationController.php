<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    //
    public function store(Request $request){
        $request->validate([
            'title'=>'required|string|max:255',
            'content'=>'required|string',
            'target_group'=>'required|in:All,Students,Teachers',
        ]);

        notification::create([
            'titre'=>$request->title,
            'content'=>$request->content,
            'target_group'=>$request->target_group,
            'created_by'=>auth()->guard('admin')->id(),
        ]);

        return to_route('notificate');
    }
}
