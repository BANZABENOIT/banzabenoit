@extends('teachers.layouts.app')
@section('title', 'mes cours')
@section('content')

  <!-- Page Header -->
  <section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Explorez Vos Cours Disponibles</h2>
      <p class="mt-2">Trouvez le cours qui est sur l'horaire et commencer à ajouter des leçons avec des vidéos et documents pdfs pour les étudiants.</p>
    </div>
  </section>

      <!-- Main Content -->
  <main class="py-12">
    <div class="container mx-auto">
      <!-- Header Section -->
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold text-blue-600">Mes Cours</h2>
        
      <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Voir Les Leçons</a>
        
      </div>

      <!-- Course List -->
      <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
      @if(empty($courses))
        <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucun cours disponible pour votre domaine, veuillez patienter l'ajout par des corps administratifs</small>
        @else
        <table class="min-w-full border-collapse border border-gray-300">
          <thead class="bg-blue-600 text-white">
            <tr >
              <th class="border border-gray-300 px-4 py-2 text-left">N°</th>
              <th class="border border-gray-300 px-4 py-2 text-left">Titre du Cours</th>
              <th class="border border-gray-300 px-4 py-2 text-left">Description</th>
              <th class="border border-gray-300 px-4 py-2 text-left">Date de Création</th>
              <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Exemple de cours -->
             @foreach ($courses as $key => $course)
              <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $key+1 }}</td>
                <td class="border border-gray-300 px-4 py-2">{{$course->titre}}</td>
                <td class="border border-gray-300 px-4 py-2">{{$course->description}}</td>
                <td class="border border-gray-300 px-4 py-2">{{$course->created_at->format('Y-m-d')}}</td>
                <td class="border border-gray-300 px-4 py-2">
                  <a href="{{ route('mes_lessons', $course->id) }}" class="text-amber-300 hover:underline">Voir</a> |
                  <a href="#" class="text-blue-600 hover:underline">Modifier</a> |
                  <a href="#" class="text-red-600 hover:underline">Supprimer</a>
                </td>
              </tr>
            @endforeach
            <!-- Ajouter plus de lignes dynamiquement -->
            <!-- <tr>
              <td class="border border-gray-300 px-4 py-2">2</td>
              <td class="border border-gray-300 px-4 py-2">Développement Web</td>
              <td class="border border-gray-300 px-4 py-2">Créer des sites web dynamiques et interactifs.</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-10</td>
              <td class="border border-gray-300 px-4 py-2">
                <a href="#" class="text-blue-600 hover:underline">Modifier</a> |
                <a href="#" class="text-red-600 hover:underline">Supprimer</a>
              </td>
            </tr> -->
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </main>


@endsection