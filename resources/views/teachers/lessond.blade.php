@extends('teachers.layouts.app')
@section('title', 'Leçons')
@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

  <!-- Page Header -->
  <section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Gerez Votre Leçon {{$lesson->titre}}</h2>
      <p class="mt-2">Gestion de vos leçons, voire meme l'ajout de vos chapitres ainsi que de nouvelles leçons du jour.</p>
    </div>
  </section>

  <section class="py-12">
    <div class="container mx-auto">
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Course Banner -->
         
          <div class="h-64 bg-gray-200">
            <video controls class="h-full">
              <source src="{{ route('video', $lesson->id) }}" type="video/mp4">
              <source src="{{ route('video', $lesson->id) }}" type="video/mov">
              <source src="{{ route('video', $lesson->id) }}" type="video/avi">
            </video>
          </div> <!-- Image placeholder -->
        
        

        <div class="p-8">
          <!-- Course Title -->
          <h2 class="text-3xl font-bold text-blue-600 mb-4 capitalize">{{$lesson->titre}}</h2>
          <!-- Course Description -->
          <p class="text-gray-700 mb-6">
            {{$lesson->description}} <br>
            Description complète du cours. Ce texte peut inclure les informations générales sur le contenu du cours, les objectifs d'apprentissage, et tout autre détail pertinent.
          </p>
          <!-- Objectives Section -->
          <h3 class="text-2xl capitalize font-semibold mb-4">Leçon de {{ $lesson->titre }} : cliquez sur telecharger pour voir le document pdf</h3>
          
          <!-- Registration Button -->
          <div class="text-center mt-8">
            
              <a href="{{ route('pdfload', $lesson->id) }}"  class="bg-blue-600 text-white px-6 py-3 rounded font-semibold shadow hover:bg-blue-700">
                télécharger PDF
              </a>

              <div class="text-right px-4 py-2 mt-4">
                <a href="{{route('createquiz', $lesson->id)}}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Créer une Évaluation</a>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection