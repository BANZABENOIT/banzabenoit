@extends('étudiants.layouts.app')
@section('title', 'cours_approuvés')
@section('content')

<section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Explorez Vos Cours auxquels vous etes approuvés</h2>
      <p class="mt-2 mb-6 text-lg">Trouvez le cours qui correspond à votre temps et commencez votre apprentissage dès aujourd'hui.</p>
      <a href="{{route('historique')}}" class="bg-white text-blue-600 px-6 py-3 rounded font-semibold shadow hover:bg-gray-100">
        voir l'historique d'Inscriptions
      </a>
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


      <!-- Main Content -->
  <main class="py-12">
    <div class="container mx-auto">
      <h2 class="text-3xl font-semibold text-blue-600 mb-6">Mes Cours Inscrits</h2>
      @if(empty($courses))
        <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Vous n'etes pas Inscrits à aucun cours, veuillez vous inscrire aux cours de votre choix parmi les cours Disponibles</small>
      @else
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($courses as $course)
        <!-- Card: Cours 1 -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <div class="h-48 bg-gray-200"></div>
          <div class="p-6">
            <h3 class="text-xl font-semibold text-blue-600 mb-4">{{$course->titre}}</h3>
            <!-- <p class="text-gray-700">{{$course->description}}</p> -->
            <a href="{{ route('lessons', $course->id) }}" class="mt-4 inline-block text-blue-600 hover:underline">Voir les leçons</a>
          </div>
        </div>
      @endforeach
      @endif
               <!-- Card: Cours 1 -->
        <!-- <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-blue-600 mb-4">Introduction à la Programmation</h3>
          <p class="text-gray-700">Explorez les bases de la programmation avec des exemples pratiques.</p>
          <a href="#" class="mt-4 inline-block text-blue-600 hover:underline">Voir les leçons</a>
        </div> --> 
      </div>
    </div>
  </main>


@endsection