<?php

use App\Http\Controllers\navigation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\membercontroller;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\teacherNavigation;
use App\Http\Controllers\MessageControllers;
use App\Http\Controllers\MessageControllert;
use App\Http\Controllers\candidaturecontroller;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\studentglobalController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

Route::get('/', function () {
    return view('bienvenue');
});
Route::post("/enregistrement",[membercontroller::class,"createUser"])->name("create");
Route::get("/bienvenue",[UserController::class,"retour"])->name("home");
Route::post("/connexion", [loginController::class,"login"])->name("connexion");

Route::middleware(['auth:admin'])->group(function () {
    Route::get("/administration/dashboards",[UserController::class,"admin"])->name("admin");
    Route::get("/administration/ajout_d'un_étudiant",[UserController::class,"user"])->name("add_student");
    Route::get("/administration/ajout_d'un_enseignant",[UserController::class,"users"])->name("add_teacher");
    Route::get("/administration/ajout_d'un_cours",[UserController::class,"cours"])->name("add_course");
    Route::get("/administration/ajout_d'un_superviseur",[UserController::class,"superviseurs"])->name("add_admin");
    Route::get("/administration/ajout_d'un_domaine",[UserController::class,"domaines"])->name("add_domaine");

    // Route::get("/administration/dashboards",[navigation::class,"dashboard"])->name("dashboard");
    Route::get("/administration/étudiants",[navigation::class,"student"])->name("admin_student");
    Route::get("/administration/enseignants",[navigation::class,"teacher"])->name("admin_teacher");
    Route::get("/administration/cours",[navigation::class,"course"])->name("course");
    Route::get("/administration/horaires",[navigation::class,"horaire"])->name("horairs");
    Route::get("/administration/notifications",[navigation::class,"notificate"])->name("notificate");
    Route::get("/administration/superviseurs",[navigation::class,"supervision"])->name("supervision");
    Route::get("/administration/profils",[navigation::class,"profil"])->name("profile");
    Route::get("/administration/candidatures_en_attente",[navigation::class,"candidate"])->name("candidatures");
    Route::get("/administration/inscriptions_en_attente",[navigation::class,"candidates"])->name("inscriptions_en_attente");
    Route::get("/administration/historiques_inscriptions",[navigation::class,"history"])->name("historiques_cours");
    Route::get("/administration/les_évaluations",[adminController::class,"viewquiz"])->name("viewquiz");
    Route::get("/administration/les_résultats",[adminController::class,"point"])->name("point");
    Route::get('/administration/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/administration/messages/{member}', [MessageController::class, 'show'])->name('messages.show');

    Route::post("/candidatures/{id}/approuver",[candidaturecontroller::class,"approuver"])->name("approuverCand");
    Route::post("/enregistrement_d'un_admin",[adminController::class,"createAdmin"])->name("createadmin");
    Route::post("/enregistrement_d'un_domaine",[adminController::class,"createDomaine"])->name("createdomaine");
    Route::post("/enregistrement_d'un_cours",[adminController::class,"createCourse"])->name("createcourse");
    Route::post("/enregistrement_d'un_professeur",[adminController::class,"createTeacher"])->name("createteacher");
    Route::post("/enregistrement_d'un_étudiant",[adminController::class,"createStudent"])->name("createstudent");
    Route::post("/horaires_des_cours",[adminController::class,"createHoraire"])->name("createhoraire");
    Route::post("/administration/notifications",[notificationController::class,"store"])->name("createnotification");
    Route::post('/messages/{member}', [MessageController::class, 'store'])->name('messages.store');
    Route::post('/messages/{id}/read', [MessageController::class, 'markAsRead'])->name('messages.read');
    Route::post("/logouta",[loginController::class,"logouta"])->name('logouta');
    Route::post('/administration/profile/preview', [navigation::class, 'preview'])->name('profile.previewa');
    Route::post('/administration/profile/update', [navigation::class, 'updateProfile'])->name('profile.updated');


});

Route::middleware(['auth:teacher'])->group(function () {
    Route::get("/enseignant/tableau_de_bord",[UserController::class,"teacher"])->name("teacher");
    Route::get("/enseignant/mes_cours",[teacherNavigation::class,"courses"])->name("mes_cours");
    Route::get("/enseignant/{id}/mes_leçons",[teacherNavigation::class,"leçons"])->name("mes_lessons");
    Route::get("/enseignant/{id}/mes_questions",[teacherNavigation::class,"quiz"])->name("mes_questions");
    Route::get("/enseignant/mes_étudiants",[teacherNavigation::class,"students"])->name("mes_étudiants");
    Route::get("/enseignant/horaires",[teacherNavigation::class,"horaires"])->name("horaire");
    Route::get("/enseignant/notification",[teacherNavigation::class,"notificates"])->name("notifications");
    Route::get("/enseignant/profil",[teacherNavigation::class,"profil"])->name("profils");
    Route::get("/enseignant/évaluations",[teacherNavigation::class,"evaluate"])->name("evaluate");
    Route::get("/enseignant/ajout_d'un_cours",[UserController::class,"cours"])->name("add_courses");
    Route::get("/enseignant/{id}/ajout_d'une_leçon",[teacherNavigation::class,"addlesson"])->name("add_lessons");
    Route::get("/enseignant/{id}/ajout_d'une_question",[teacherNavigation::class,"addquestion"])->name("add_questions");
    Route::get("/enseignant/{id}/{lessonId}/detail_lesson",[teacherNavigation::class,"onelesson"])->name("onelesson");
    Route::get("/enseignant/{id}/download",[teacherNavigation::class,"pdf"])->name("pdfload");
    Route::get("/enseignant/{id}/video",[teacherNavigation::class,"video"])->name("video");
    Route::get("/enseignant/{id}/createquiz",[teacherNavigation::class,"createquiz"])->name("createquiz");
    Route::get("/enseignant/resultats",[teacherNavigation::class,"result"])->name("resultat");
    Route::get('/enseignant/message', [MessageControllert::class, 'indexet'])->name('messages.indexet');
    Route::get('/enseignant/message/{member}', [MessageControllert::class, 'showet'])->name('messages.showet');

    Route::post("enseignant/enregistrement_d'un_cours",[adminController::class,"createCourse"])->name("createcourses");
    Route::post("enseignant/{id}/enregistrement_d'une_leçon",[teacherNavigation::class,"upload"])->name("createlesson");
    Route::post("enseignant/{id}/enregistrement_d'une_évaluation",[teacherNavigation::class,"uploaded"])->name("createquizs");
    Route::post("enseignant/{id}/enregistrement_d'une_question",[teacherNavigation::class,"quizup"])->name("addquiz");
    Route::post('/message/{member}', [MessageControllert::class, 'storet'])->name('messages.storet');
    Route::post('/message/{id}/read', [MessageControllert::class, 'markAsReadet'])->name('messages.readet');
    Route::post("/logout",[loginController::class,"logout"])->name('logout');
    Route::post('/enseignant/profile/preview', [teacherNavigation::class, 'preview'])->name('profile.previewet');
    Route::post('/enseignant/profile/update', [teacherNavigation::class, 'updateProfile'])->name('profile.updates');


});

Route::middleware(['auth:student'])->group(function () {
    Route::get("/étudiant/accueil",[UserController::class,"student"])->name("student");
    Route::get("/étudiant/cours_disponibles",[studentController::class,"courses"])->name("cours");
    Route::get("/étudiant/cours_approuvés",[studentController::class,"approuves"])->name("allowed");
    Route::get("/étudiant/notifications",[studentController::class,"notificates"])->name("notification");
    Route::get("/étudiant/horaires",[studentController::class,"horaires"])->name("horaires");
    Route::get("/étudiant/profil",[studentController::class,"profil"])->name("profil");
    Route::get("/étudiant/évaluations",[studentController::class,"quiz"])->name("quiz");
    Route::get("/étudiant/historiques_inscriptions",[studentglobalController::class,"historique"])->name("historique");
    Route::get("/étudiant/cours/{id}/détails",[studentglobalController::class,"details"])->name("details");
    Route::get("/étudiant/cours/{id}/lessons",[studentController::class,"lessons"])->name("lessons");
    Route::get("/étudiant/cours/{id}/inscription_au_cours",[studentglobalController::class,"inscription"])->name("inscription");
    Route::get("/étudiant/quiz/{id}/soumission_du_quiz",[studentglobalController::class,"quizzes"])->name("examen");
    Route::get("/étudiant/cours/{id}/{lessonId}/détail_de_la_leçon",[studentglobalController::class,"detail"])->name("lesson");
    Route::get("/étudiant/{id}/downloads",[teacherNavigation::class,"pdf"])->name("pdfloads");
    Route::get("/étudiant/{id}/videos",[teacherNavigation::class,"video"])->name("videos");
    Route::get("/étudiant/tes_resultats",[studentglobalController::class,"result"])->name("result");
    Route::get('/étudiants/messages', [MessageControllers::class, 'indexes'])->name('messages.indexes');
    Route::get('/étudiants/messages/{member}', [MessageControllers::class, 'showes'])->name('messages.showes');

    Route::post("/étudiant/cours/{id}/inscription_au_cours",[studentglobalController::class,"inscriptionSubmit"])->name("inscriptioncours");
    Route::post("/étudiant/questions/{id}/soumission",[studentglobalController::class,"soumission"])->name("questionsubmit");
    Route::post('/étudiant/message/{member}', [MessageControllers::class, 'stores'])->name('messages.stores');
    Route::post('/étudiant/message/{id}/read', [MessageControllers::class, 'markAsReades'])->name('messages.reades');
    Route::post("/logouts",[loginController::class,"logouts"])->name('logouts');
    Route::post('/étudiant/profile/preview', [studentController::class, 'preview'])->name('profile.preview');
    Route::post('/étudiant/profile/update', [studentController::class, 'updateProfile'])->name('profile.update');

});

