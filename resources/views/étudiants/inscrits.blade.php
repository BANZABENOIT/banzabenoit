@extends('étudiants.layouts.app')
@section('title', 'cours inscrits')
@section('content')


<section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold capitalize">Consultez L'historique de Vos Cours auxquels vous vous etes Inscrits</h2>
      <p class="mt-2 capitalize">Toutes vos Historiques d'inscriptions sont disponibles ici si vous voulez voir l'inscription cliquez sur voir les Détails.</p>
    </div>
  </section>

<!-- Search and Filters -->
<section class="py-8">
    <div class="container mx-auto">
      <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
        <!-- Search Bar -->
        <input 
          type="text" 
          placeholder="Rechercher un cours..." 
          class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"
        />
        <!-- Filters -->
        <div class="flex space-x-4">
          <select class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            <option>Catégorie</option>
            <option>acceptée</option>
            <option>Rejeté</option>
            <option>En_attente</option>
          </select>
          <select class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            <option>Cours</option>
            <option>Date</option>
          </select>
        </div>
      </div>
    </div>
  </section>

    <!-- Enrolled Courses Section -->
  <section class="py-12">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center">Mes Cours Inscrits historiques</h2>
      <div class="bg-white rounded-lg shadow-md p-8 overflow-x-auto">
      @if($enrollments->isEmpty())
      <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucun cours disponible pour votre domaine, veuillez patienter l'ajout par des corps administratifs</small>
    @else
        <!-- Courses Table -->
        <table class="w-full table-auto border-collapse">
          <thead>
            <tr class="bg-gray-200 text-gray-700">
              <th class="px-4 py-2 text-left">N°</th>
              <th class="px-4 py-2 text-left">Titre du Cours</th>
              <th class="px-4 py-2 text-left">Date d'Inscription</th>
              <th class="px-4 py-2 text-left">Statut</th>
              <th class="px-4 py-2 text-left">Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Example Row (Replace with dynamic data) -->
             @foreach($enrollments as $key =>$enrollment)
            <tr class="border-t">
              <td class="px-4 py-2">{{ $key+1 }}</td>
              <td class="px-4 py-2">{{$enrollment->course_name}}</td>
              <td class="px-4 py-2">{{$enrollment->created_at->format('d/m/Y')}}</td>
              <td class="px-4 py-2 text-yellow-600 font-semibold">{{$enrollment->status}}</td>
              <td class="px-4 py-2">
                <a href="#" class="text-blue-600 hover:underline">Voir Détails</a>
              </td>
            </tr>
            @endforeach
            <!-- <tr class="border-t">
              <td class="px-4 py-2">Nom du Cours 2</td>
              <td class="px-4 py-2">15 Décembre 2024</td>
              <td class="px-4 py-2 text-green-600 font-semibold">Approuvé</td>
              <td class="px-4 py-2">
                <a href="#" class="text-blue-600 hover:underline">Voir Détails</a>
              </td>
            </tr>
            <tr class="border-t">
              <td class="px-4 py-2">Nom du Cours 3</td>
              <td class="px-4 py-2">10 Décembre 2024</td>
              <td class="px-4 py-2 text-red-600 font-semibold">Rejeté</td>
              <td class="px-4 py-2">
                <a href="#" class="text-blue-600 hover:underline">Voir Détails</a>
              </td>
            </tr> -->
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </section>


@endsection