<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class authcontroller extends Controller
{
    //
    public function connexion(Request $request){
       $request->validate([
        'email' =>'required|string|min:5|max:255',
        'matricule' =>'required|string|min:6|max:255'
       ]);
       $membre = null;
       $membre = DB::table('admins')->where('email', $request->email)->where('matricule', $request->matricule)->first();
        if(!$membre){
            $membre = DB::table('students')->where('email', $request->email)->where('matricule', $request->matricule)->first();
        }
        if (!$membre){
            $membre = DB::table('teachers')->where('email', $request->email)->where('matricule', $request->matricule)->first();
        }
        if ($membre){
            $user = DB::table('members')->where('email', $membre->email)->first();
            if ($user){
                Session::put('member_id', $user->id);
                Session::put('email', $user->email);
                Session::put('role', $user->role);

                if($user->role === 'admin'){
                    return to_route('admin');
                }
                elseif($user->role === 'teacher'){
                    return to_route('teacher');
                }
                elseif($user->role === 'student'){
                    return to_route('student');
                }
            }
            else {
                return back()->with('error', 'role utilisateur non trouvé, essayez de créer un compte en cliquant sur inscription');
            }
        }
        return back()->with('error', 'email ou matricule incorrect');
    }

    public function dashboard(){
        if (!Session::has('member_id')) {
            return to_route('login');
        }

        $role = Session::get('role');
        return view('dashboard', compact('role'));
    }



}
