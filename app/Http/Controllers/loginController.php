<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\admin;
use App\Models\member;
use App\Models\student;
use App\Models\teacher;
use Illuminate\Http\Request;

class loginController extends Controller
{
    //
    public function login( Request $request){
        $request->validate([
            'email' =>'required|string|min:5|max:255',
            'matricule' =>'required|string|min:6|max:255'
        ]);

        $email = $request->input('email');
        $matricule = $request->input('matricule');

        $admin = admin::where('email', $email)->where('matricule', $matricule)->first();
        $teacher = teacher::where('email', $email)->where('matricule', $matricule)->first();
        $student = student::where('email', $email)->where('matricule', $matricule)->first();

        if($admin){
            auth()->guard('admin')->login($admin);
            $this->updateOnlineStatus($admin->member_id);
            return to_route('admin');
        }
        if($teacher){
            auth()->guard('teacher')->login($teacher);
            $this->updateOnlineStatus($teacher->member_id);
            return to_route('teacher');
        }
        if($student){
            auth()->guard('student')->login($student);
            $this->updateOnlineStatus($student->member_id);
            return to_route('student');
        }
        return back()->with('error', 'email ou matricule incorrect');;
    }

    private function updateOnlineStatus($member_id){
        $member = member::find($member_id);
        if($member){
            $member->update([
                'online' => true,
                'last_seen' => null,
            ]);
        }
    }

    public function logout() {
        $user = null;
        $guard = null;

        if(auth()->guard('teacher')->check()) {
            $user = auth()->guard('teacher')->user();
            $guard = 'teacher';
        }

        if($user && $guard){
            $member_id = $user->member_id;

            $this->updateOfflineStatus($user->member_id);

            auth()->guard($guard)->logout();
        }

        return redirect()->route('login');
    }
    public function logouta() {
        $user = null;
        $guard = null;

        if(auth()->guard('admin')->check()) {
            $user = auth()->guard('admin')->user();
            $guard = 'admin';
        }

        if($user && $guard){
            $member_id = $user->member_id;

            $this->updateOfflineStatus($user->member_id);

            auth()->guard($guard)->logout();
        }

        return redirect()->route('login');
    }
    public function logouts() {
        $user = null;
        $guard = null;

        if(auth()->guard('student')->check()) {
            $user = auth()->guard('student')->user();
            $guard = 'student';
        }

        if($user && $guard){
            $member_id = $user->member_id;

            $this->updateOfflineStatus($user->member_id);

            auth()->guard($guard)->logout();
        }

        return redirect()->route('login');
    }

    private function updateOfflineStatus($member_id){
        $member = member::find($member_id);
        if($member){
            $member->update([
                'online' => false,
                'last_seen' => Carbon::now(),
            ]);
        }
    }
}
