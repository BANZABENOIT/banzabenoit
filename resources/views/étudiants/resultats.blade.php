@extends('étudiants.layouts.app')
@section('title', 'résultats d examens')
@section('content')

<section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Explorez Les Évaluations Disponibles pour Vous</h2>
      <p class="mt-2">Trouvez L'Evaluation qui correspond à vos attentes et commencez votre exercice et soumettre les réponses.</p>
      
    </div>
  </section>

      <!-- Exam Results Section -->
  <section class="py-12">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center">Résultats des Examens</h2>
      <div class="bg-white rounded-lg shadow-md p-8 overflow-x-auto">
        <!-- Results Table -->
        <table class="w-full table-auto border-collapse">
          <thead>
            <tr class="bg-gray-200 text-gray-700">
              <th class="px-4 py-2 text-left">Titre du Quiz</th>
              <th class="px-4 py-2 text-left">Date de l'Examen</th>
              <th class="px-4 py-2 text-left">Note Obtenue</th>
              <th class="px-4 py-2 text-left">Statut</th>
              <th class="px-4 py-2 text-left">Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Example Row (Replace with dynamic data) -->
             @foreach($results as $result)
            <tr class="border-t">
              <td class="px-4 py-2">{{$result->quiz->titre}}</td>
              <td class="px-4 py-2">{{$result->created_at->format('d  F  Y')}}</td>
              <td class="px-4 py-2">{{$result->score}}%</td>
              @if($result->status == 'réussi')
              <td class="px-4 py-2 text-green-600 font-semibold capitalize">{{$result->status}}</td>
              @elseif($result->status == 'satisfaction')
              <td class="px-4 py-2 text-yellow-400 font-semibold capitalize">{{$result->status}}</td>
              @elseif($result->status == 'distinction')
              <td class="px-4 py-2 text-emerald-600 font-semibold capitalize">{{$result->status}}</td>
              @elseif($result->status == 'grande distinction')
              <td class="px-4 py-2 text-cyan-600 font-semibold capitalize">{{$result->status}}</td>
              @else
              <td class="px-4 py-2 text-red-600 font-semibold capitalize">{{$result->status}}</td>
              @endif
              <td class="px-4 py-2">
                <a href="#" class="text-blue-600 hover:underline">Voir Détails</a>
              </td>
            </tr>
            @endforeach
            <!-- <tr class="border-t">
              <td class="px-4 py-2">Nom du Cours 2</td>
              <td class="px-4 py-2">10 Décembre 2024</td>
              <td class="px-4 py-2">45%</td>
              <td class="px-4 py-2 text-red-600 font-semibold">Échoué</td>
              <td class="px-4 py-2">
                <a href="#" class="text-blue-600 hover:underline">Voir Détails</a>
              </td>
            </tr>
            <tr class="border-t">
              <td class="px-4 py-2">Nom du Cours 3</td>
              <td class="px-4 py-2">5 Décembre 2024</td>
              <td class="px-4 py-2">75%</td>
              <td class="px-4 py-2 text-green-600 font-semibold">Réussi</td>
              <td class="px-4 py-2">
                <a href="#" class="text-blue-600 hover:underline">Voir Détails</a>
              </td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </div>
  </section>


@endsection