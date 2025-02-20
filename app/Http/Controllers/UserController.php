<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\admin;
use App\Models\cours;
use App\Models\member;
use App\Models\domaine;
use App\Models\teacher;
use App\Models\candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\adminController;

class UserController extends Controller
{
    //
    public function retour(){
        return view('bienvenue');
    }
    public function admin(){
        $totalCours = cours::count();
        $totalEtudiants = member::where('role', 'étudiant')->count();
        $totalEnseignants = member::where('role', 'enseignant')->count();
        $totalInscriptionEnAttente = candidature::where('status', 'en_attente')->count();
        return view('admins.dashboard', ['totalCours'=>$totalCours, 'totalEtudiants'=>$totalEtudiants, 'totalEnseignants'=>$totalEnseignants, 'totalInscriptionEnAttente'=>$totalInscriptionEnAttente]);
    }
    public function teacher(){
        return view('teachers.accueil');
    }
    public function student(){
        $student = Auth::guard('student')->user();
        $courses = cours::where('domaine_id', $student->domaine_id)->get();
        return view('étudiants.accueil', ['courses'=>$courses]);
    }
    public function user(){
        $domaines=domaine::all();
        return view('added.student', ['domaines'=>$domaines]);
    }
    public function users(){
        $domaines=domaine::all();
        return view('added.teacher', ['domaines'=>$domaines]);
    }
    public function cours(){
        $domaines=domaine::all();
        $teachers=teacher::all();
        return view('added.course', ['domaines'=>$domaines, 'teachers'=>$teachers]);
    }
    public function superviseurs(){
        return view('added.admin');
    }
    public function domaines(){
        $admins=admin::all();
        return view('added.domaine', ['admins'=>$admins]);
    }
}
