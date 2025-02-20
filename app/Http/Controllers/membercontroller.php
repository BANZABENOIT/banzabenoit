<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\candidature;
use Illuminate\Http\Request;

class membercontroller extends Controller
{
    //
    public function createUser(Request $request){
        
        $request->validate([
            'name'=>'required|string|min:5|max:255',
            'email'=>'required|string|min:5|max:255',
            'téléphone'=>'required|string|min:8|max:20',
            'domaine_id'=>'required|exists:domaines,id',
            'motivation'=>'required|string|min:20|max:255',
        ]);
        $member= member::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'téléphone'=>$request->téléphone,
            'motivation'=>$request->motivation,
            'role'=>'étudiant',
            
        ]);


        candidature::create([
            'member_id'=>$member->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->téléphone,
            'domaine_id'=>$request->domaine_id,
            'motivation'=>$request->motivation,
            
        ]);
        return view('auth.confirmation');
    }
}
