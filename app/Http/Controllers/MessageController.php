<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function index()
    {
        $member = auth()->guard('admin')->user();


        
        
        // Récupérer les utilisateurs sauf l'utilisateur connecté
        $contacts = member::where('id', '!=', $member->member_id)
            ->orderByRaw("CASE WHEN online = 1 THEN 0 ELSE 1 END")
            ->orderBy('last_seen', 'desc')
            ->get();

        return view('messages.index', compact('contacts', 'member'));
    }

    public function show(member $member)
    {
        $authmember = auth()->guard('admin')->user();
        
        message::where('receiver_id', $authmember->member_id)
            ->where('sender_id', $member->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        // Récupérer les utilisateurs sauf l'utilisateur connecté
        $contacts = member::where('id', '!=', $authmember->member_id)
            ->orderByRaw("CASE WHEN online = 1 THEN 0 ELSE 1 END")
            ->orderBy('last_seen', 'desc')
            ->get();

        $messages = message::where(function ($query) use ($authmember, $member) {
            $query->where('sender_id', $authmember->id)->where('receiver_id', $member->id);
        })->orWhere(function ($query) use ($authmember, $member) {
            $query->where('sender_id', $member->id)->where('receiver_id', $authmember->id);
        })->orderBy('created_at', 'asc')->get();

        return view('messages.show', compact('messages', 'member', 'contacts', 'authmember'));
    }

    public function store(Request $request, member $member)
    {
        $authmember = auth()->guard('admin')->user();


        
       

        $request->validate([
            'content' => 'required|string',
        ]);

        message::create([
            'sender_id' => $authmember->member_id,
            'receiver_id' => $member->id,
            'content' => $request->content,
        ]);

        return redirect()->route('messages.show', $member->id);
    }

    public function markAsRead($id)
    {
        $authmember = auth()->guard('admin')->user();


       
       

        $message = message::where('id', $id)
                        ->where('receiver_id', $authmember->id())
                        ->first();

        if ($message && !$message->read_at) {
            $message->update(['read_at' => now()]);
        }

        return response()->json(['success' => true]);
    }


}
