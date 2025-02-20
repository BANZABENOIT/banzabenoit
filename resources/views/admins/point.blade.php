@extends('admins.layouts.app')
@section('title', 'mes évaluations')
@section('content')

  <!-- Page Header -->
  <section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Explorez Les Évaluations Disponibles</h2>
      <p class="mt-2">Trouvez l'évaluation non soumise et voir les questions ainsi que soumettre votre travail.</p>
    </div>
  </section>

<!-- Main Content -->
<main class="py-12">
    <div class="container mx-auto">
      <h2 class="text-3xl font-semibold text-blue-600 mb-6">Résultats d'étudiants</h2>

      <!-- Table -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="px-6 py-3 text-left">Étudiant</th>
              <th class="px-6 py-3 text-left">Cours</th>
              <th class="px-6 py-3 text-left">enseignant du cours</th>
              <th class="px-6 py-3 text-left">Note d'étudiant</th>
              <th class="px-6 py-3 text-left">Statut</th>
            </tr>
          </thead>
          <tbody>
            @foreach($results as $result)
            <tr class="border-b">
              <td class="px-6 py-4">{{$result->student->name}}</td>
              <td class="px-6 py-4">{{$result->quiz->lesson->cours->titre}}</td>
              <td class="px-6 py-4">{{$result->quiz->lesson->cours->teacher->name}}</td>
              <td class="px-6 py-4">{{$result->score}}%</td>
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
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>

@endsection