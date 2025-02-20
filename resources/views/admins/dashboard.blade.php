@extends('admins.layouts.app')
@section('title', 'tableau de board')
@section('content')

<!-- Hero Section -->
<section class="bg-blue-600 text-white py-20">
    <div class="container mx-auto text-center">
      <h2 class="text-4xl font-bold mb-4">Apprenez à votre rythme, où que vous soyez</h2>
      <p class="text-lg mb-2">Explorez une variété de cours adaptés à vos besoins et développez vos compétences dès aujourd'hui.</p>
    </div>
  </section>

      <!-- Main Content -->
  <main class="py-12">
    <div class="container mx-auto ">
      <!-- Header Section -->
      <div class="mb-8 text-center">
        <h2 class="text-3xl font-semibold text-blue-600">Tableau de Bord</h2>
        <p class="text-gray-600">Vue d'ensemble des statistiques de la plateforme.</p>
      </div>

      <!-- Statistiques -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Étudiants -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-gray-700">Étudiants</h3>
          <p class="text-4xl font-bold text-blue-600 mt-4">{{$totalEtudiants}}</p>
          <p class="text-gray-700">Gérez vos cours, ajoutez de nouveaux modules et suivez les progrès de vos étudiants.</p>
          <a href="{{ route('admin_student') }}" class="text-sm text-blue-500 hover:underline mt-2 block">Voir tous</a>
        </div>

        <!-- Enseignants -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-gray-700">Enseignants</h3>
          <p class="text-4xl font-bold text-blue-600 mt-4">{{$totalEnseignants}}</p>
          <p class="text-gray-700">Gérez vos cours, ajoutez de nouveaux modules et suivez les progrès de vos étudiants.</p>
          <a href="{{ route('admin_teacher') }}" class="text-sm text-blue-500 hover:underline mt-2 block">Voir tous</a>
        </div>

        <!-- Cours -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-gray-700">Cours</h3>
          <p class="text-4xl font-bold text-blue-600 mt-4">{{$totalCours}}</p>
          <p class="text-gray-700">Gérez vos cours, ajoutez de nouveaux modules et suivez les progrès de vos étudiants.</p>
          <a href="{{ route('course') }}" class="text-sm text-blue-500 hover:underline mt-2 block">Voir tous</a>
        </div>

        
      </div>

        <!-- Inscriptions en Attente -->
        
        <div class="mt-12 bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-gray-700">Inscriptions en Attente</h3>
          <p class="text-4xl font-bold text-blue-600 mt-4">{{$totalInscriptionEnAttente}}</p>
          <p class="text-gray-700">Gérez vos cours, ajoutez de nouveaux modules et suivez les progrès de vos étudiants.</p>
          <a href="{{route('candidatures')}}" class="text-sm text-blue-500 hover:underline mt-2 block">Gérer</a>
        </div>

        <!-- evaluations et results -->
        
        <div class="mt-12 bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-gray-700">Évaluations Disponibles</h3>
          <p class="text-xl font-bold text-blue-600 mt-4">consultez les quizzes et les résultats pour tous les Étudiants</p>
          <p class="text-gray-700">suggérez des modifications pour les évaluations et suivez l'évolution de vos étudiants via leur performance et points obtenus.</p>
          <a href="{{route('viewquiz')}}" class="text-sm text-blue-500 hover:underline mt-2 block">Voir Tous</a>
        </div>

        <div class="mt-12 bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-gray-700">Explorez la communauté</h3>
          <p class="text-xl font-bold text-blue-600 mt-4">consultez les membres disponibles pour partager les opinions ensemble</p>
          <p class="text-gray-700">suggérez des modifications pour les évaluations et suivez l'évolution de vos étudiants via leur performance et points obtenus.</p>
          <a href="{{route('messages.index')}}" class="text-sm text-blue-500 hover:underline mt-2 block">commencer</a>
        </div>

      <!-- Graphiques -->
      <div class="mt-12 bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Statistiques Globales</h3>
        <div class="h-64 bg-gray-100 flex items-center justify-center text-gray-500">
          <p>Graphique à intégrer ici</p>
        </div>
      </div>
    </div>
  </main>


@endsection