@extends('étudiants.layouts.app')
@section('title', 'Cours disponibles')
@section('content')

    <!-- Page Header -->
  <section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Explorez Nos Cours Disponibles</h2>
      <p class="mt-2">Trouvez le cours qui correspond à vos besoins et commencez votre apprentissage dès aujourd'hui.</p>
    </div>
  </section>

  <!-- Search and Filters -->
  <section class="py-8">
    <div class="container mx-auto">
      <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
        <!-- Search Bar -->
        <input 
          type="text" 
          placeholder="Rechercher un cours..." 
          class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"
        />
        <!-- Filters -->
        <div class="flex space-x-4">
          <select class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            <option>Catégorie</option>
            <option>Programmation</option>
            <option>Design</option>
            <option>Marketing</option>
          </select>
          <select class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            <option>Prix</option>
            <option>Gratuit</option>
            <option>Payant</option>
          </select>
        </div>
      </div>
    </div>
  </section>

  <!-- Courses List -->
  <section class="py-8">
    <div class="container mx-auto">
    @if($courses->isEmpty())
      <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucun cours disponible pour votre domaine, veuillez patienter l'ajout par des corps administratifs</small>
    @else
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Course Card -->
        @foreach($courses as $course)
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="h-48 bg-gray-200"></div> <!-- Image placeholder -->
            <div class="p-6">
              <h4 class="text-xl font-bold mb-2">{{$course->titre}}</h4>
              <p class="text-gray-600 mb-4">{{$course->description}}</p>
              <a href="{{ route('details', $course->id) }}" class="text-blue-600 font-semibold hover:underline">Voir les détails</a>
            </div>
          </div>
        @endforeach
    @endif
        <!-- Add more cards -->
        <!-- <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="h-48 bg-gray-200"></div>
          <div class="p-6">
            <h4 class="text-xl font-bold mb-2">Titre du cours</h4>
            <p class="text-gray-600 mb-4">Description courte du cours...</p>
            <a href="#" class="text-blue-600 font-semibold hover:underline">Voir les détails</a>
          </div>
        </div>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="h-48 bg-gray-200"></div>
          <div class="p-6">
            <h4 class="text-xl font-bold mb-2">Titre du cours</h4>
            <p class="text-gray-600 mb-4">Description courte du cours...</p>
            <a href="#" class="text-blue-600 font-semibold hover:underline">Voir les détails</a>
          </div>
        </div> -->
      </div>
    </div>
  </section>

@endsection