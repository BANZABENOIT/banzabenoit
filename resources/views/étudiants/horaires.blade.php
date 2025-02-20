@extends('étudiants.layouts.app')
@section('title', 'Horaires')
@section('content')

<section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Explorez Vos Horaires Disponibles</h2>
      <p class="mt-2">Trouvez l'heure à laquelle une leçon sera disponible sur la plateforme pour etre pret d'apprendre.</p>
    </div>
  </section>

  <!-- Main Content -->
  <main class="py-12">
    <div class="container mx-auto px-6">
      <!-- Header Section -->
      <div class="mb-8">
        <h2 class="text-3xl font-semibold text-blue-600">Horaires des Cours</h2>
        <p class="text-gray-600">Consultez vos horaires de cours pour la semaine.</p>
      </div>

      <!-- Schedule Table -->
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Mes Horaires</h3>
        <div class="overflow-x-auto">
        @if($horaires->isEmpty())
      <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucun horaire disponible pour le moment, veuillez patienter l'ajout par des corps administratifs</small>
    @else
          <table class="min-w-full bg-white border border-gray-300">
            <thead>
              <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">N°</th>
                <th class="py-3 px-6 text-left">Jour</th>
                <th class="py-3 px-6 text-left">Heure</th>
                <th class="py-3 px-6 text-left">Cours</th>
                <th class="py-3 px-6 text-left">Enseignant</th>
                <th class="py-3 px-6 text-left">Salle</th>
              </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
              <!-- Example Schedule -->
               @foreach($horaires as $key =>$horaire)
              <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6">{{ $key+1 }}</td>
                <td class="py-3 px-6">{{ $horaire->jours }}</td>
                <td class="py-3 px-6">{{ $horaire->heure }}</td>
                <td class="py-3 px-6">{{ $horaire->cours }}</td>
                <td class="py-3 px-6">{{ $horaire->enseignant }}</td>
                <td class="py-3 px-6">Salle 101</td>
              </tr>
              @endforeach
              <!-- <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6">Mardi</td>
                <td class="py-3 px-6">10:00 - 12:00</td>
                <td class="py-3 px-6">Physique</td>
                <td class="py-3 px-6">Mme. Lwambo</td>
                <td class="py-3 px-6">Salle 202</td>
              </tr> -->
              <!-- Ajouter dynamiquement -->
            </tbody>
          </table>
          @endif
        </div>
        
      </div>
    </div>
  </main>

@endsection