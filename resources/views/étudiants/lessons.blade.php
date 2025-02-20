@extends('étudiants.layouts.app')
@section('title', 'Leçons pour le cours')
@section('content')

<section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Explorez Les Leçons de {{$course->titre}}</h2>
      <p class="mt-2 mb-6 text-lg">Commencez par la première leçon pour maximiser la chance d'obtention de certificat à la fin du cours.</p>
      <a href="{{route('cours')}}" class="bg-white text-blue-600 px-6 py-3 rounded font-semibold shadow hover:bg-gray-100">
        voir l'historique d'Inscriptions
      </a>
    </div>
  </section>

  <!-- Main Content -->
  <main class="py-12">
    <div class="container mx-auto">
      <h2 class="text-3xl font-semibold text-blue-600 mb-6">Leçons du Cours: {{$course->titre}}</h2>
      @if($lessons->isEmpty()))
        <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucune leçon disponible pour ce cours, veuillez patienter l'ajout par des corps administratifs ou un enseignant</small>
      @else
      <ul class="list-disc pl-6 space-y-4">
        @foreach($lessons as $key => $lesson)
        <li><a href="{{route('lesson', ['id'=>$course->id, 'lessonId'=>$lesson->id])}}" class="text-blue-600 hover:underline">Leçon {{$key+1}}: {{$lesson->titre}}</a></li>
        <!-- <li><a href="#" class="text-blue-600 hover:underline">Leçon 2: Variables et types de données</a></li>
        <li><a href="#" class="text-blue-600 hover:underline">Leçon 3: Structures conditionnelles</a></li> -->
        <!-- Ajouter d'autres leçons -->
         @endforeach
      </ul>
      @endif
    </div>
  </main>

@endsection
