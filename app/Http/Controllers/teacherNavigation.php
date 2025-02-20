<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use App\Models\cours;
use App\Models\lesson;
use App\Models\member;
use App\Models\horaire;
use App\Models\question;
use App\Models\resultat;
use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class teacherNavigation extends Controller
{
    //
    public function courses(){
        $teacher = Auth::guard('teacher')->user();
        $courses = cours::where('teacher_id', $teacher->id)->get();
        return view('teachers.cours', ['courses'=>$courses]);
    }
    public function students(){
        $teacher = Auth::guard('teacher')->user();
        $courses = $teacher->cours()->where('teacher_id', $teacher->id)->get();
        $students = collect();

        foreach ($courses as $course){
            $inscriptions = $course->enrollments;

            foreach ($inscriptions as $inscription){
                $student = $inscription->student;
                $student ->course_name = $course->titre;
                $student->created_at = $inscription->created_at;
                $students = $students->push($inscription->student);
            }
            
        }
        
        return view('teachers.étudiants', ['students'=> $students]);
    }
    public function horaires(){
        $teacher = Auth::guard('teacher')->user();
        $horaires = horaire::where('enseignant', $teacher->name)->get();
        return view('teachers.horaires', ['horaires'=>$horaires]);
    }
    public function notificates(){
        $notifications = notification::where('target_group', 'Teachers')->orWhere('target_group', 'All')->get();
        return view('teachers.notifications', ['notifications'=>$notifications]);
    }
    public function evaluate(){
        $teacher = Auth::guard('teacher')->user();
        $courses = $teacher->cours()->with('lesson.quiz')->where('teacher_id', $teacher->id)->get();
        // foreach($courses as $course){
        //     $lessons = lesson::with('cours')->where('cour_id', $course->id)->get();
        //     foreach($lessons as $lesson){
        //         $quizzes = quiz::with('lesson.cours')->where('lesson_id', $lesson->id)->get();
        //     }
            // $quizzes = quiz::with('lesson.cours')->get();

        
        return view('teachers.evaluations', ['courses'=>$courses]);
    }

    public function leçons($id){
        $teacher = Auth::guard('teacher')->user();
        $course = cours::find($id);
        $availables = $course->lesson()->where('cour_id', $course->id)->get();
        $lessons = [];
        foreach ($availables as $available){
            $lessons = lesson::where('cour_id', $available->cour_id)->get();
        
            //  $lessons [] =$lessons;
           
        }
        return view('teachers.lessons', ['course'=>$course, 'lessons'=>$lessons]);
    }

    public function quiz($id){
        $teacher = Auth::guard('teacher')->user();
        $quiz = quiz::find($id);
        $availables = $quiz->question()->where('quiz_id', $quiz->id)->get();
        $questions =[];
        foreach ($availables as $available){
            $questions = question::where('quiz_id', $available->quiz_id)->get();
            // $questions [] = $questions;
        }
        return view('teachers.questions', ['quiz'=>$quiz, 'questions'=>$questions]);
    }

    public function addlesson($id){
        $teacher = Auth::guard('teacher')->user();
        $course = cours::find($id);
        return view('teachers.form', ['course'=>$course]);
    }
    public function addquestion($id){
        $teacher = Auth::guard('teacher')->user();
        $quiz = quiz::findOrFail($id);
        return view('teachers.createquestion', ['quiz'=>$quiz]);
    }

    public function quizup(Request $request, $id){
        $quiz = quiz::findOrFail($id);
        $request->validate([
            'question_text'=>'required|string|min:5',
            'option_a'=>'required|string|min:1',
            'option_b'=>'required|string|min:1',
            'option_c'=>'required|string|min:1',
            'option_d'=>'required|string|min:1',
            'correct_option'=>'required|string|min:1',
        ]);

        question::create([
            'quiz_id'=>$quiz->id,
            'question_text'=>$request->question_text,
            'option_a'=>$request->option_a,
            'option_b'=>$request->option_b,
            'option_c'=>$request->option_c,
            'option_d'=>$request->option_d,
            'option_correcte'=>$request->correct_option,
        ]);

        return to_route('mes_questions', $quiz->id);
    }

    public function upload(Request $request, $id){
        $course = cours::find($id);
        $request->validate([
            'name'=>'required|string|min:3',
            'description'=>'required|string|min:8',
            'video'=>'nullable|mimes:mp4,mov,avi|max:204800',
            'pdf'=>'nullable|mimes:pdf|max:10240',
        ]);

        $videoPath = null;
        $pdfPath = null;

        if($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
        }
        if($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('pdfs', 'public');
        }

        lesson::create([
            'cour_id'=>$course->id,
            'titre'=>$request->name,
            'description'=>$request->description,
            'video_url'=>$videoPath,
            'pdf_url'=>$pdfPath,
        ]);

        return to_route('mes_lessons', $course->id);
    }

    public function uploaded(Request $request, $id){
        $lesson = lesson::find($id);
        $request->validate([
            'name'=>'required|string|min:3',
            'description'=>'required|string|min:5',
        ]);
        
        quiz::create([
            'lesson_id'=>$lesson->id,
            'titre'=>$request->name,
            'description'=>$request->description,
        ]);

        return to_route('evaluate');

    }

    public function onelesson($id, $lessonId){
        $teacher=Auth::guard('teacher')->user();
        $lesson= lesson::where('cour_id', $id)->findOrFail($lessonId);
        return view ('teachers.lessond', ['lesson'=>$lesson]);
    }

    public function pdf($id){
        $lesson= lesson::find($id);
        if(!$lesson->pdf_url){
            return redirect()->back()->with('error', 'aucun fichier Pdf');
        }

        if(Storage::disk('public')->exists($lesson->pdf_url)){
            return redirect()->back()->with('error', 'fichier Pdf introuvable');
        }
        return Storage::disk('public')->download($lesson->pdf_url);
    }
    public function video($id){
        $lesson= lesson::find($id);
        if(!$lesson->video_url || !Storage::disk('public')->exists($lesson->video_url)){
            abort(404, 'video introuvable.');
        }

        $filePath = Storage::disk('public')->path($lesson->video_url);
        $mimeType = mime_content_type($filePath);
        
        return response()->file($filePath, [
            'content-Type' => $mimeType,
        ]);
    }

    public function createquiz($id){
        $teacher = Auth::guard('teacher')->user();
        $lesson= lesson::find($id);
        
        return view('teachers.createquiz', compact('lesson'));
    }
    public function result(){
        $teacher = Auth::guard('teacher')->user();
        $results = resultat::with(['student', 'quiz.lesson.cours'])->get();
        
        return view('teachers.results', compact('results'));
    }

    public function profil(){
        $teacher=Auth::guard('teacher')->user();

        return view('teachers.profil', compact('teacher'));
    }

    public function preview(Request $request) {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Stocker temporairement l'image
        $path = $request->file('photo')->store('temp', 'public');

        return view('teachers.preview', ['imagePath' => $path]);
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'imagePath' => 'required|string',
        ]);

        $teacher = Auth::guard('teacher')->user();
        $tempPath = storage_path('app/public/' . $request->imagePath);

        if (!file_exists($tempPath)) {
            return redirect()->route('profil')->withErrors(['message' => 'Image introuvable']);
        }

        // Déplacer l'image vers le dossier final
        $finalPath = 'images/' . uniqid() . '.png';
        Storage::disk('public')->move($request->imagePath, $finalPath);

        // Supprimer l'ancienne image et mettre à jour l'utilisateur
        if ($teacher->photo_de_profil) {
            Storage::disk('public')->delete($teacher->photo_de_profil);
        }

        $user = member::findOrFail($teacher->member_id);
        if ($user->photo_de_profil) {
            Storage::disk('public')->delete($user->photo_de_profil);
        }

        $teacher->photo_de_profil = $finalPath;
        $teacher->save();

        $user->photo_de_profil = $finalPath;
        $user->save();

        return redirect()->route('profils')->with('success', 'Photo de profil mise à jour !');
    }

}
