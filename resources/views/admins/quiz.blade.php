@extends('admins.layouts.app')
@section('title', 'mes évaluations')
@section('content')

  <!-- Page Header -->
  <section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Explorez Les Évaluations Disponibles</h2>
      <p class="mt-2">Trouvez l'évaluation non soumise et voir les resultats ainsi que soumettre votre travail.</p>
    </div>
  </section>

<!-- Main Content -->

<main class="py-12">
<div class="container mx-auto">
  <div class="container">
    <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-semibold text-blue-600 mb-6">Évaluations</h2>
            <!-- Add Evaluation Button -->
            <div class="text-right px-4 py-2">
                <a href="{{ route('point') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Voir résultats</a>
            </div>
        </div>

    @if($courses->isEmpty())
        <p class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucun cours trouvé.</p>
    @else
        @foreach($courses as $cour)
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="flex justify-center uppercase items-center text-3xl text-gray-600 font-bold mt-5 mb-4 underline">cours de {{ $cour->titre }}</h3>
                </div>
                <div class="card-body">
                    @if($cour->lesson->isEmpty())
                        <p class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8 mb-6">Aucune leçon pour ce cours.</p>
                    @else
                        @foreach($cour->lesson as $lecon)
                            <div class="mb-3">
                                <h5 class="text-3xl font-semibold text-blue-600 mb-5">Leçon : {{ $lecon->titre }}</h5>
                                @if($lecon->quiz->isEmpty())
                                    <p class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8 mb-6">Aucune évaluation pour cette leçon.</p>
                                @else
                                <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                                      <table class="min-w-full table-auto">
                                        <thead class="bg-blue-600 text-white">
                                          <tr>
                                            <th class="px-6 py-3 text-left">N°</th>
                                            <th class="px-6 py-3 text-left">Titre</th>
                                            <th class="px-6 py-3 text-left">Description</th>
                                            <th class="px-6 py-3 text-left">Date Limite</th>
                                            <th class="px-6 py-3 text-left">Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($lecon->quiz as $key=> $quiz)
                                          <tr class="border-b">
                                            <td class="px-6 py-4">{{$key+1}}</td>
                                            <td class="px-6 py-4">{{$quiz->titre}}</td>
                                            <td class="px-6 py-4">{{$quiz->description}}</td>
                                            <td class="px-6 py-4">15 Janvier 2025</td>
                                            <td class="px-6 py-4">
                                              <a href="{{route('mes_questions', $quiz->id)}}" class="text-blue-600 hover:underline">Voir</a> |
                                              <a href="#" class="text-green-600 hover:underline">Modifier</a> |
                                              <a href="#" class="text-red-600 hover:underline">Supprimer</a>
                                            </td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                    
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
    @endif
  </div>
</div>
</main>


@endsection