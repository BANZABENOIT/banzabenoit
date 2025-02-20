@extends('teachers.layouts.app')
@section('title', 'Accueil')
@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

  <!-- Page Header -->
  <section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Meilleure plateforme pour exploiter vos qualités d'enseignement </h2>
      <p class="mt-2 mb-7">Commencez à enseigner les leçons de vos cours dès aujourd'hui pour garantir une jeunesse intelligente et intellectuelle.</p>
      <a href="{{route('messages.indexet')}}" class="bg-white text-blue-600 px-6 py-3 rounded font-semibold shadow hover:bg-gray-100 mt-6">commencer</a>
    </div>
  </section>
    <!-- Main Content Area -->
  <main class="py-12">
    <div class="container mx-auto">

      <!-- Dashboard Overview -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1: Mes Cours -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-blue-600 mb-4">Mes Cours</h3>
          <p class="text-gray-700">Gérez vos cours, ajoutez de nouveaux modules et suivez les progrès de vos étudiants.</p>
          <a href="{{route('mes_cours')}}" class="mt-4 inline-block text-blue-600 hover:underline">Voir mes cours</a>
        </div>

        <!-- Card 2: Étudiants Inscrits -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-blue-600 mb-4">Étudiants Inscrits</h3>
          <p class="text-gray-700">Consultez la liste des étudiants inscrits à vos cours et suivez leur progression.</p>
          <a href="{{route('mes_étudiants')}}" class="mt-4 inline-block text-blue-600 hover:underline">Voir les étudiants</a>
        </div>

        <!-- Card 3: Notifications -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-blue-600 mb-4">Notifications</h3>
          <p class="text-gray-700">Recevez des notifications concernant les étudiants, les examens et les mises à jour des cours.</p>
          <a href="{{route('notifications')}}" class="mt-4 inline-block text-blue-600 hover:underline">Voir les notifications</a>
        </div>
      </div>

      <!-- Course Management Section (Optional) -->
      <div class="mt-12 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-blue-600 mb-4">Gérer mes Cours</h2>
        <p class="text-gray-700 mb-4">Ajoutez, modifiez ou supprimez des cours. Suivez les progrès des étudiants et gérez les évaluations.</p>
        <a href="{{route('mes_cours')}}" class="inline-block text-blue-600 hover:underline">Gérer les cours</a>
      </div>

      <!-- Course Management Section (Optional) -->
      <div class="mt-12 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-blue-600 mb-4">Gérer mes Horaires</h2>
        <p class="text-gray-700 mb-4">Consultez, modifiez ou supposez des modifications. Suivez les progrès des étudiants et gérez les évaluations.</p>
        <a href="{{route('horaire')}}" class="inline-block text-blue-600 hover:underline">Voir les horaires</a>
      </div>

    </div>
  </main>


@endsection