@extends('étudiants.layouts.app')
@section('title', 'Evaluations')
@section('content')

<section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Explorez Les Évaluations Disponibles pour Vous</h2>
      <p class="mt-2 mb-6">Trouvez L'Evaluation qui correspond à vos attentes et commencez votre exercice et soumettre les réponses.</p>
      <a href="{{route('result')}}" class="bg-white text-blue-600 px-6 py-3 rounded font-semibold shadow hover:bg-gray-100">
        voir tes resultats
      </a>
    </div>
  </section>

      <!-- Main Content -->
  <main class="py-12">
    <div class="container mx-auto">
    @if(empty($quizzes))
      <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucune évaluation disponible pour votre domaine, veuillez patienter l'ajout par des corps administratifs</small>
    @else
      <h2 class="text-3xl font-semibold text-blue-600 mb-6">Évaluations Disponibles</h2>

      <!-- Table -->
      <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full table-auto">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="px-6 py-3 text-left">N°</th>
              <th class="px-6 py-3 text-left">Titre</th>
              <th class="px-6 py-3 text-left">leçon</th>
              <th class="px-6 py-3 text-left">Date Limite</th>
              <th class="px-6 py-3 text-left">Statut</th>
              <th class="px-6 py-3 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>  
            @foreach($quizzes as $key =>$quiz)
            <tr class="border-b">
              <td class="px-6 py-4">{{$key+1}}</td>
              <td class="px-6 py-4">{{$quiz->titre}}</td>
              <td class="px-6 py-4">{{$quiz->lesson->titre}}</td>
              <td class="px-6 py-4">15 Janvier 2025</td>
              <td class="px-6 py-4">Non soumis</td>
              <td class="px-6 py-4">
                <a href="{{ route('examen', $quiz->id) }}" class="text-blue-600 hover:underline">Soumettre</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif
    </div>
  </main>


@endsection