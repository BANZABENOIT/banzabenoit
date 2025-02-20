@extends('étudiants.layouts.app')
@section('title', 'details du cours')
@section('content')

      <!-- Course Details Section -->
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
          <h3 class="text-2xl font-semibold mb-4">Objectifs du cours</h3>
          <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6">
            <li>Objectif 1 du cours</li>
            <li>Objectif 2 du cours</li>
            <li>Objectif 3 du cours</li>
          </ul>
          <!-- Registration Button -->
          <div class="text-center">
            <a href="{{ route('inscription', $course->id) }}" class="bg-blue-600 text-white px-6 py-3 rounded font-semibold shadow hover:bg-blue-700">
              S'inscrire au cours
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="bg-gray-200 py-12">
    <div class="container mx-auto">
      <h3 class="text-2xl font-bold text-center mb-8">Témoignages d'Étudiants</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Testimonial 1 -->
        <div class="bg-white rounded-lg shadow-md p-6">
          <p class="text-gray-600 italic">"Ce cours m'a permis d'acquérir de nouvelles compétences en peu de temps."</p>
          <h5 class="text-blue-600 font-bold mt-4">- Étudiant 1</h5>
        </div>
        <!-- Add more testimonials -->
        <div class="bg-white rounded-lg shadow-md p-6">
          <p class="text-gray-600 italic">"Un excellent cours avec des ressources de qualité."</p>
          <h5 class="text-blue-600 font-bold mt-4">- Étudiant 2</h5>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
          <p class="text-gray-600 italic">"Un excellent cours avec des ressources de qualité qui m'ont permises d'etre performant dans peu de temps."</p>
          <h5 class="text-blue-600 font-bold mt-4">- Étudiant 3</h5>
        </div>
      </div>
    </div>
  </section>


@endsection