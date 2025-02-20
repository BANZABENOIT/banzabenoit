@extends('étudiants.layouts.app')
@section('title', 'Accueil')
@section('content')
    
    <!-- Hero Section -->
  <section class="bg-blue-600 text-white py-20">
    <div class="container mx-auto text-center">
      <h2 class="text-4xl font-bold mb-4">Apprenez à votre rythme, où que vous soyez</h2>
      <p class="text-lg mb-6">Explorez une variété de cours adaptés à vos besoins et développez vos compétences dès aujourd'hui.</p>
      <a href="{{route('cours')}}" class="bg-white text-blue-600 px-6 py-3 rounded font-semibold shadow hover:bg-gray-100">
        Explorer les Cours
      </a>
      <a href="{{route('messages.indexes')}}" class="bg-white text-blue-600 px-6 py-3 rounded font-semibold shadow hover:bg-gray-100 ml-4">commencer</a>
      </div>
  </section>

  <!-- Featured Courses -->
  <section id="courses" class="py-16">
    <div class="container mx-auto">
      <h3 class="text-3xl font-bold text-center mb-8">Cours populaires</h3>
      @if($courses->isEmpty())
        <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucun cours disponible pour votre domaine, veuillez patienter l'ajout par des corps administratifs</small>
      @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Card 1 -->
          @foreach($courses as $course)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
              <div class="h-48 bg-gray-200"></div> <!-- Image placeholder -->
              <div class="p-6">
                <h4 class="text-xl font-bold mb-2 capitalize">{{$course->titre}}</h4>
                <p class="text-gray-600 mb-4 capitalize">{{$course->description}}</p>
                <a href="{{ route('details', $course->id) }}" class="text-blue-600 font-semibold hover:underline">Voir les détails</a>
              </div>
            </div>
          @endforeach
        @endif
        <!-- <div class="bg-white rounded-lg shadow-md overflow-hidden"> -->
          <!-- <div class="h-48 bg-gray-200"></div> Image placeholder -->
          <!-- <div class="p-6">
            <h4 class="text-xl font-bold mb-2">Titre du cours</h4>
            <p class="text-gray-600 mb-4">Description courte du cours...</p>
            <a href="#" class="text-blue-600 font-semibold hover:underline">Voir les détails</a>
          </div>
        </div> -->
        <!-- Ajoutez plus de cartes ici -->
        <!-- <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="h-48 bg-gray-200"></div>
          <div class="p-6">
            <h4 class="text-xl font-bold mb-2">Titre du cours</h4>
            <p class="text-gray-600 mb-4">Description courte du cours...</p>
            <a href="#" class="text-blue-600 font-semibold hover:underline">Voir les détails</a>
          </div>
        </div> -->
        <!-- <div class="bg-white rounded-lg shadow-md overflow-hidden"> -->
          <!-- <div class="h-48 bg-gray-200"></div> Image placeholder -->
          <!-- <div class="p-6">
            <h4 class="text-xl font-bold mb-2">Titre du cours</h4>
            <p class="text-gray-600 mb-4">Description courte du cours...</p>
            <a href="#" class="text-blue-600 font-semibold hover:underline">Voir les détails</a>
          </div>
        </div> -->
        <!-- <div class="bg-white rounded-lg shadow-md overflow-hidden"> -->
          <!-- <div class="h-48 bg-gray-200"></div> Image placeholder -->
          <!-- <div class="p-6">
            <h4 class="text-xl font-bold mb-2">Titre du cours</h4>
            <p class="text-gray-600 mb-4">Description courte du cours...</p>
            <a href="#" class="text-blue-600 font-semibold hover:underline">Voir les détails</a>
          </div>
        </div> -->
        <!-- Ajoutez plus de cartes ici -->
        <!-- <div class="bg-white rounded-lg shadow-md overflow-hidden">
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

  <!-- Testimonials -->
  <section class="bg-gray-200 py-16">
    <div class="container mx-auto">
      <h3 class="text-3xl font-bold text-center mb-8">Témoignages</h3>
      <div class="flex flex-col md:flex-row justify-center space-y-6 md:space-y-0 md:space-x-6">
        <!-- Testimonial 1 -->
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
          <p class="text-gray-600 italic">"Une plateforme incroyable qui m'a permis de développer mes compétences en un rien de temps."</p>
          <h5 class="text-blue-600 font-bold mt-4">- Étudiant 1</h5>
        </div>
        <!-- Ajoutez plus de témoignages ici -->
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
          <p class="text-gray-600 italic">"Les cours sont bien structurés et faciles à suivre."</p>
          <h5 class="text-blue-600 font-bold mt-4">- Étudiant 2</h5>
        </div>
      </div>
    </div>
  </section>


@endsection