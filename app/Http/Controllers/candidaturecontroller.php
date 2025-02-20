<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Mail\Candidatures;
use App\Models\candidature;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class candidaturecontroller extends Controller
{
    //
    public function approuver($id){
        $candidature = candidature::findOrFail($id);

        if($candidature) {
            $candidature->status = 'accepted';
            $candidature->save();
        }
        $student = student::where('email', $candidature->email)->first();

        if(!$student) {
            $student = new student();
            $student->name = $candidature->name;
            $student->email = $candidature->email;
            $student->phone_number = $candidature->phone_number;
            $student->domaine_id = $candidature->domaine_id;
            $student->member_id = $candidature->member_id;
            $student->matricule = student::generateMatricule();
            $student->save();
        } else {
            $student->domaine_id = $candidature->domaine_id;
            $student->matricule = student::generateMatricule();
            $student->save();
        }
        

        Mail::to($student->email)->send(new Candidatures($student));

        return back()->with('success', 'candidature approuvée et étudiant ajouté');
    }
}
