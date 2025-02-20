<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageControllers extends Controller
{
    //
    public function indexes()
    {
        $member = Auth::guard('student')->user();

       
        
        // Récupérer les utilisateurs sauf l'utilisateur connecté
        $contacts = member::where('id', '!=', $member->member_id)
            ->orderByRaw("CASE WHEN online = 1 THEN 0 ELSE 1 END")
            ->orderBy('last_seen', 'desc')
            ->get();

        return view('messages.indexes', compact('contacts', 'member'));
    }

    public function showes(member $member)
    {
        $authmember = Auth::guard('student')->user();
        
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
            $query->where('sender_id', $authmember->member_id)->where('receiver_id', $member->id);
        })->orWhere(function ($query) use ($authmember, $member) {
            $query->where('sender_id', $member->id)->where('receiver_id', $authmember->member_id);
        })->orderBy('created_at', 'asc')->get();

        return view('messages.showes', compact('messages', 'member', 'contacts', 'authmember'));
    }

    public function stores(Request $request, member $member)
    {
        $authmember = Auth::guard('student')->user();;

       
        
        $request->validate([
            'content' => 'required|string',
        ]);

        message::create([
            'sender_id' => $authmember->member_id,
            'receiver_id' => $member->id,
            'content' => $request->content,
        ]);

        return redirect()->route('messages.showes', $member->id);
    }

    public function markAsReades($id)
    {
        $authmember = Auth::guard('student')->user();;



        $message = message::where('id', $id)
                        ->where('receiver_id', $authmember->id())
                        ->first();

        if ($message && !$message->read_at) {
            $message->update(['read_at' => now()]);
        }

        return response()->json(['success' => true]);
    }

}
