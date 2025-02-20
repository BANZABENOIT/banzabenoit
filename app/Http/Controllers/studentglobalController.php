<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use App\Models\cours;
use App\Models\lesson;
use App\Models\question;
use App\Models\resultat;
use App\Models\enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class studentglobalController extends Controller
{
    //
    public function details($id){
        $course= cours::find($id);
        if(!$course){
            abort(404);
        }
        return view('étudiants.details', ['course'=>$course]);
    }

    public function inscription($id){
        $student=Auth::guard('student')->user();
        $course= cours::find($id);
        
        return view('auth.enrollement', ['course'=>$course, 'student'=>$student]);
    }
    public function inscriptionSubmit(Request $request, $id){
        $student=Auth::guard('student')->user();
        $course= cours::find($id);
        $existing = enrollment::where('student_id', $student->id)->where('course_name', $course->titre)->first();
        if($existing){
            return to_route('cours')->with('error', 'vous etes déjà inscrit à ce cours.');
        }

        $request->validate([
            'message'=>'required|string|max:255',
        ]);

        enrollment::create([
            'student_id'=>$student->id,
            'course_name'=>$course->titre,
            'motivation'=>$request->message,
        ]);
        return to_route('cours')->with('success', 'Inscription Réussie au cours : '. $course->titre);
    }

    public function detail($id, $lessonId){
        $student=Auth::guard('student')->user();
        $lesson= lesson::where('cour_id', $id)->findOrFail($lessonId);
        return view('étudiants.lesson', ['lesson'=>$lesson]);
    }
    public function quizzes($id){
        $student=Auth::guard('student')->user();
        $quiz= quiz::findOrFail($id);
        $questions = question::with('quiz')->where('quiz_id', $quiz->id)->get();
        return view('étudiants.submit', ['questions'=>$questions, 'quiz'=>$quiz]);
    }

    public function soumission( Request $request, $id){
        $student=Auth::guard('student')->user();
        $quiz= quiz::findOrFail($id);
        $questions = $quiz->question;

        $score = 0;
        $totalQuestions = $questions->count();
        $correctAnswers = 0;

        $missingAnswers = [];

        foreach ($questions as $question) {
            $studentAnswer = $request->input('question_' . $question->id);
            if (!$studentAnswer){
                $missingAnswers [] = $question->id;
            } elseif ($studentAnswer === $question->option_correcte) {
                $correctAnswers++;
                $score = $correctAnswers / $totalQuestions * 100;
            }


            if($score > 90){
                $status = "grande distinction";
            }
            elseif($score > 75){
                $status = "distinction";
            }
            elseif($score > 65){
                $status = "satisfaction";
            }
            elseif($score >= 50){
                $status = "réussi";
            }
            else {
                $status = 'échoué';
            }
        }

        if(count($missingAnswers) > 0){
            return back()->with('error', 'vous devez répondre à toutes les questions avant de soumettre le travail.')->withInput();
        }

        

        resultat::create([
            'quiz_id' => $quiz->id,
            'student_id' => $student->id,
            'total_questions' => $totalQuestions,
            'correct_answers' => $correctAnswers,
            'score' => $score,
            'status' => $status,
        ]);

        return to_route('quiz');
       
    }

    public function result(){
        $student=Auth::guard('student')->user();
        $results = resultat::with('quiz')->where('student_id', $student->id)->get();
        return view ('étudiants.resultats', ['results'=>$results]);
    }

    public function historique(){
        $student=Auth::guard('student')->user();
        $enrollments = $student->enrollments()->get();
        return view('étudiants.inscrits', ['enrollments'=>$enrollments]);
    }
}
