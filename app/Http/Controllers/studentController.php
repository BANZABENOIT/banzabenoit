<?php

namespace App\Http\Controllers;

use App\Models\cours;
use App\Models\lesson;
use App\Models\member;
use App\Models\horaire;
use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class studentController extends Controller
{
    //
    public function courses(){
        $student = Auth::guard('student')->user();
        $courses = cours::where('domaine_id', $student->domaine_id)->get();
        return view('étudiants.cours', ['courses'=>$courses]);
    }
    public function approuves(){
        $student = Auth::guard('student')->user();
        $alloweds = $student->enrollments()->where('status', 'accepted')->get();
        $courses= [];
        foreach ($alloweds as $allowed){
            $course = cours::where('titre', $allowed->course_name)->first();
            if($course){
                $courses [] =$course;
            }
        }
        return view('étudiants.approuvés', ['courses'=>$courses]);
    }

    public function lessons($id){
        $student = Auth::guard('student')->user();
        $course = cours::findOrFail($id);
        $allowed = $student->enrollments->where('course_name', $course->titre)->first();

        if(!$allowed){
            return to_route('allowed')->with('error', 'vous n etes pas inscrit à ce cours.');
        }
        $availables = $course->lesson()->where('cour_id', $course->id)->get();
        $lessons = [];
        foreach ($availables as $available){
            $lessons = lesson::where('cour_id', $available->cour_id)->get();
            // if($lesson){
            //     $lessons [] =$lesson;
            // }
        }
        return view('étudiants.lessons', ['course'=>$course, 'lessons'=>$lessons]);
    }

    public function horaires(){
        $horaires = horaire::all();
        return view('étudiants.horaires', ['horaires'=>$horaires]);
    }

    public function notificates(){
        $notifications = notification::where('target_group', 'Students')->get();
        return view('étudiants.notifications', ['notifications'=>$notifications]);
    }

    public function quiz(){
        $student = Auth::guard('student')->user();
        $enrollments= $student->enrollments()->where('status', 'accepted')->get();
        $coursesnames= $enrollments->pluck('course_name');
        $quizzes = [];
        $courses = cours::whereIn('titre', $coursesnames)->get();

        foreach($courses as $course){
            $lessons = lesson::where('cour_id', $course->id)->get();
            foreach($lessons as $lesson){
                $lessonquizzes = $lesson->quiz;
                foreach($lessonquizzes as $quiz){
                    $quizzes []= $quiz;
                }
            }
        }
        return view('étudiants.évaluations', ['quizzes'=>$quizzes]);
    }

    public function profil(){
        $student = Auth::guard('student')->user();
        return view('étudiants.profil', compact('student'));
    }
    
    public function preview(Request $request) {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Stocker temporairement l'image
        $path = $request->file('photo')->store('temp', 'public');

        return view('étudiants.preview', ['imagePath' => $path]);
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'imagePath' => 'required|string',
        ]);

        $student = Auth::guard('student')->user();
        $tempPath = storage_path('app/public/' . $request->imagePath);

        if (!file_exists($tempPath)) {
            return redirect()->route('profil')->withErrors(['message' => 'Image introuvable']);
        }

        // Déplacer l'image vers le dossier final
        $finalPath = 'images/' . uniqid() . '.png';
        Storage::disk('public')->move($request->imagePath, $finalPath);

        // Supprimer l'ancienne image et mettre à jour l'utilisateur
        if ($student->photo_de_profil) {
            Storage::disk('public')->delete($student->photo_de_profil);
        }

        $user = member::findOrFail($student->member_id);
        if ($user->photo_de_profil) {
            Storage::disk('public')->delete($user->photo_de_profil);
        }

        $student->photo_de_profil = $finalPath;
        $student->save();

        $user->photo_de_profil = $finalPath;
        $user->save();

        return redirect()->route('profil')->with('success', 'Photo de profil mise à jour !');
    }

}
