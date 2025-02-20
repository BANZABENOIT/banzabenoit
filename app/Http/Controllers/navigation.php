<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\cours;
use App\Models\member;
use App\Models\domaine;
use App\Models\horaire;
use App\Models\student;
use App\Models\teacher;
use App\Models\enrollment;
use App\Models\candidature;
use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class navigation extends Controller
{
    //
    public function dashboard(){
        $totalCours = cours::count();
        $totalEtudiants = member::where('role', 'étudiant')->count();
        $totalEnseignants = member::where('role', 'enseignant')->count();
        $totalInscriptionEnAttente = candidature::where('status', 'en_attente')->count();
        return view('admins.dashboard', ['totalCours'=>$totalCours, 'totalEtudiants'=>$totalEtudiants, 'totalEnseignants'=>$totalEnseignants, 'totalInscriptionEnAttente'=>$totalInscriptionEnAttente]);
    }
    public function student(){
        $students=student::with(['domaine'])->get();
        return view('admins.étudiants', ['students'=>$students]);
    }
    public function teacher(){
        $teachers=teacher::with(['domaine'])->get();
        return view('admins.teachers', ['teachers'=>$teachers]);
    }
    public function course(){
        $courses=cours::with(['domaine', 'teacher'])->get();
        return view('admins.cours', ['courses'=>$courses]);
    }
    public function horaire(){
        $teachers=teacher::all();
        $courses=cours::all();
        $horaires=horaire::all();
        return view('admins.horaires', ['teachers'=>$teachers, 'courses'=>$courses, 'horaires'=>$horaires]);
    }
    public function notificate(){
        $notifications = notification::all();
        return view('admins.notifications', ['notifications'=>$notifications]);
    }
    public function supervision(){
        $admins=admin::all();
        return view('admins.superviseur', ['admins'=>$admins]);
    }
    public function candidate(){
        $candidatures=candidature::with(['domaine', 'member'])->where('status', 'en_attente')->get();
        return view('admins.candidatures', ['candidatures'=>$candidatures]);
    }
    public function candidates(){
        $enrollments=enrollment::with(['cours', 'student'])->where('status', 'en_attente')->get();
        return view('admins.inscriptions', ['enrollments'=>$enrollments]);
    }
    public function history(){
        $enrollments=enrollment::all();
        $candidatures=candidature::all();
        return view('admins.historiques', ['enrollments'=>$enrollments, 'candidatures'=>$candidatures]);
    }
    public function profil(){
        $admin = Auth::guard('admin')->user();
        return view('admins.profil', compact('admin'));
    }

    public function preview(Request $request) {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Stocker temporairement l'image
        $path = $request->file('photo')->store('temp', 'public');

        return view('admins.preview', ['imagePath' => $path]);
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'imagePath' => 'required|string',
        ]);

        $admin = Auth::guard('admin')->user();
        $tempPath = storage_path('app/public/' . $request->imagePath);

        if (!file_exists($tempPath)) {
            return redirect()->route('profil')->withErrors(['message' => 'Image introuvable']);
        }

        // Déplacer l'image vers le dossier final
        $finalPath = 'images/' . uniqid() . '.png';
        Storage::disk('public')->move($request->imagePath, $finalPath);

        // Supprimer l'ancienne image et mettre à jour l'utilisateur
        if ($admin->photo_de_profil) {
            Storage::disk('public')->delete($admin->photo_de_profil);
        }

        $user = member::findOrFail($admin->member_id);
        if ($user->photo_de_profil) {
            Storage::disk('public')->delete($user->photo_de_profil);
        }

        $admin->photo_de_profil = $finalPath;
        $admin->save();

        $user->photo_de_profil = $finalPath;
        $user->save();

        return redirect()->route('profile')->with('success', 'Photo de profil mise à jour !');
    }

}
