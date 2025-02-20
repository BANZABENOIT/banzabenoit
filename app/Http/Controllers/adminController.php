<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\cours;
use App\Models\member;
use App\Models\domaine;
use App\Models\horaire;
use App\Models\student;
use App\Models\teacher;
use App\Models\resultat;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function createAdmin(Request $request){
        $request->validate([
            'name'=>'required|string|min:5|max:255',
            'email'=>'required|string|min:5|max:255',
            'matricule'=>'required|string|min:6|max:255',
            'téléphone'=>'required|string|min:8|max:20',
            'motivation'=>'required|string|min:20|max:255',
        ]);
        $member= member::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'téléphone'=>$request->téléphone,
            'motivation'=>$request->motivation,
            'role'=>'admin',
            
        ]);


        admin::create([
            'member_id'=>$member->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'matricule'=>$request->matricule,
            'phone_number'=>$request->téléphone,
            
        ]);
        return to_route('supervision');
    }


    public function createDomaine(Request $request){
        $request->validate([
            'name'=>'required|string|min:3|max:255',
            'description'=>'required|string|min:10|max:255',
            'admin_id'=>'required|exists:admins,id',
        ]);

        domaine::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'admin_id'=>$request->admin_id,
        ]);

        return to_route('course');
    }
    public function createCourse(Request $request){
        $request->validate([
            'name'=>'required|string|min:3|max:255',
            'description'=>'required|string|min:10|max:255',
            'domaine_id'=>'required|exists:domaines,id',
            'teacher_id'=>'required|exists:teachers,id',
        ]);

        cours::create([
            'titre'=>$request->name,
            'description'=>$request->description,
            'domaine_id'=>$request->domaine_id,
            'teacher_id'=>$request->teacher_id,
            'prix'=>00.00,
        ]);

        return to_route('course');
    }

    public function createTeacher(Request $request){
        $request->validate([
            'name'=>'required|string|min:5|max:255',
            'email'=>'required|string|min:5|max:255',
            'matricule'=>'required|string|min:6|max:255',
            'téléphone'=>'required|string|min:8|max:20',
            'domaine_id'=>'required|exists:domaines,id',
            'motivation'=>'required|string|min:20|max:255',
        ]);
        $member= member::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'téléphone'=>$request->téléphone,
            'motivation'=>$request->motivation,
            'role'=>'enseignant',
            
        ]);


        teacher::create([
            'member_id'=>$member->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'matricule'=>$request->matricule,
            'phone_number'=>$request->téléphone,
            'domaine_id'=>$request->domaine_id,
        ]);
        return to_route('admin_teacher');
    }

    public function createStudent(Request $request){
        $request->validate([
            'name'=>'required|string|min:5|max:255',
            'email'=>'required|string|min:5|max:255',
            'matricule'=>'required|string|min:6|max:255',
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


        student::create([
            'member_id'=>$member->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'matricule'=>$request->matricule,
            'phone_number'=>$request->téléphone,
            'domaine_id'=>$request->domaine_id,
        ]);
        return to_route('admin_student');
    }

    public function createHoraire(Request $request){
        $request->validate([
            'jour'=>'required|string|min:3|max:25',
            'time'=>'required|string|min:3|max:25',
            'course'=>'required|string|min:3|max:200',
            'enseignant'=>'required|string|min:5|max:200',
        ]);

        horaire::create([
            'jours'=>$request->jour,
            'heure'=>$request->time,
            'cours'=>$request->course,
            'enseignant'=>$request->enseignant,
        ]);

        return to_route('horairs');
    }

    public function viewquiz(){
        $courses = cours::with('lesson.quiz')->get();
        return view('admins.quiz', compact('courses'));
    }

    public function point(){
        $results = resultat::with(['student', 'quiz.lesson.cours.teacher'])->get();
        
        return view('admins.point', compact('results'));
    }
}
