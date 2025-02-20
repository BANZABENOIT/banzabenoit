@extends('teachers.layouts.app')
@section('title', 'Leçons')
@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

  <!-- Page Header -->
  <section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Gerez Vos Leçons Pour Chaque Cours</h2>
      <p class="mt-2">Gestion de vos leçons, voire meme l'ajout de vos chapitres ainsi que de nouvelles leçons du jour.</p>
    </div>
  </section>

  <section class="py-12">
    <div class="container mx-auto">
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Course Banner -->
        <div class="h-64 bg-gray-200"></div> <!-- Image placeholder -->
        <div class="p-8">
          <!-- Course Title -->
          <h2 class="text-3xl font-bold text-blue-600 mb-4 capitalize">{{$course->titre}}</h2>
          <!-- Course Description -->
          <p class="text-gray-700 mb-6">
            {{$course->description}} <br>
            Description complète du cours. Ce texte peut inclure les informations générales sur le contenu du cours, les objectifs d'apprentissage, et tout autre détail pertinent.
          </p>
          <!-- Objectives Section -->
          <h3 class="text-2xl font-semibold mb-4">Leçons du cours de {{ $course->titre }}</h3>
          @if(empty($lessons))
            <small class="text-xl text-gray-600">aucune leçon disponible pour ce cours, cliquez sur ajouter pour y ajouter des Leçons</small>
          @else
          <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6">
            @foreach($lessons as $key => $lesson)
              <li><a href="{{ route('onelesson', ['id'=>$course->id, 'lessonId'=>$lesson->id]) }}">Leçon {{ $key+1 }} : {{ $lesson->titre }}</a></li>
            @endforeach
          </ul>
          @endif
          <!-- Registration Button -->
          <div class="text-center mt-8">
            <a href="{{ route('add_lessons', $course->id) }}" class="bg-blue-600 text-white px-6 py-3 rounded font-semibold shadow hover:bg-blue-700">
              Ajouter une leçon
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection