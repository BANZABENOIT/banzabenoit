@extends('admins.layouts.app')
@section('title', 'cours')
@section('content')  

<!-- Hero Section -->
<section class="bg-blue-600 text-white py-20">
    <div class="container mx-auto text-center">
      <h2 class="text-4xl font-bold mb-4">Apprenez à votre rythme, où que vous soyez</h2>
      <p class="text-lg mb-2">Explorez une variété de cours adaptés à vos besoins et développez vos compétences dès aujourd'hui.</p>
    </div>
  </section>
  
  <!-- Main Content -->
  <main class="py-12">
    <div class="container mx-auto px-6">
      <!-- Header Section -->
      <div class="mb-8">
        <h2 class="text-3xl font-semibold text-blue-600">Gestion des Cours</h2>
        <p class="text-gray-600">Liste et gestion des cours disponibles sur la plateforme.</p>
      </div>

      <!-- Search and Add -->
      <div class="flex justify-between items-center mb-6">
        <input 
          type="text" 
          placeholder="Rechercher un cours..." 
          class="w-1/3 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
        />
       <div class="flex justify-between gap-2">
       <button 
          class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">
          <a href="{{ route('add_course') }}">Ajouter un Cours</a>
        </button>
        <button 
          class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">
          <a href="{{ route('add_domaine') }}">Ajouter un Domaine</a>
        </button>
       </div>
      </div>

      <!-- Table of Courses -->
      <div class="bg-white rounded-lg shadow-md overflow-x-auto">
      @if($courses->isEmpty())
      <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucun cours disponible pour vous, veuillez patienter l'ajout par des corps administratifs</small>
    @else
        <table class="min-w-full bg-white">
          <thead class="bg-blue-600 text-white">
            <tr class="uppercase text-sm leading-normal">
              <th class="py-3 px-6 text-left">N°</th>
              <th class="py-3 px-6 text-left">Titre</th>
              <th class="py-3 px-6 text-left">Enseignant</th>
              <th class="py-3 px-6 text-left">Domaine</th>
              <th class="py-3 px-6 text-center">Statut</th>
              <th class="py-3 px-6 text-center">Actions</th>
            </tr>
          </thead>
          <tbody class="text-gray-700 text-sm font-light">
            <!-- Exemple de cours -->
             @foreach($courses as $key=>$course)
             
            <tr class="border-b border-gray-200 hover:bg-gray-100">
              <td class="py-2 px-4">{{$key+1}}</td>
              <td class="py-3 px-6 text-left whitespace-nowrap">
                <div class="flex items-center">
                  <span class="font-medium">{{$course->titre}}</span>
                </div>
              </td>
              <td class="py-3 px-6 text-left">
                <span>{{$course->teacher->name}}</span>
              </td>
              <td class="py-3 px-6 text-left">
                <span>{{$course->domaine->name}}</span>
              </td>
              <td class="py-3 px-6 text-center">
                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Actif</span>
              </td>
              <td class="py-3 px-6 text-center">
                <div class="flex item-center justify-center space-x-4">
                  <button class="text-blue-500 hover:underline">Modifier</button>
                  <button class="text-yellow-500 hover:underline">Suspendre</button>
                  <button class="text-red-500 hover:underline">Supprimer</button>
                </div>
              </td>
            </tr>
            <!-- Répéter ce bloc pour chaque cours
            <tr class="border-b border-gray-200 hover:bg-gray-100">
              <td class="py-3 px-6 text-left whitespace-nowrap">
                <div class="flex items-center">
                  <span class="font-medium">Lien vers la base de données</span>
                </div>
              </td>
              <td class="py-3 px-6 text-left">
                <span>Nom de l'enseignant</span>
              </td>
              <td class="py-3 px-6 text-left">
                <span>Catégorie du cours</span>
              </td>
              <td class="py-3 px-6 text-center">
                <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">En Attente</span>
              </td> -->
              <!-- <td class="py-3 px-6 text-center">
                <div class="flex item-center justify-center space-x-4">
                  <button class="text-blue-500 hover:underline">Modifier</button>
                  <button class="text-yellow-500 hover:underline">Approuver</button>
                  <button class="text-red-500 hover:underline">Supprimer</button>
                </div>
              </td> -->
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </main>

@endsection