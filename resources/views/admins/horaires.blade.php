@extends('admins.layouts.app')
@section('title', 'horaires')
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
        <h2 class="text-3xl font-semibold text-blue-600">Gestion des Horaires</h2>
        <p class="text-gray-600">Ajoutez, modifiez ou supprimez les horaires des teachers.</p>
      </div>

      <!-- Add Schedule Form -->
      <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Ajouter un Horaire</h3>
        <form action="{{ route('createhoraire') }}" method="POST">
        @csrf
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="jour" class="block text-gray-600 mb-2">Jour</label>
              <select name="jour" id="jour" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                <option value="" disabled selected>chosissez le jour</option>
                <option value="Lundi">Lundi</option>
                <option value="Mardi">Mardi</option>
                <option value="Mercredi">Mercredi</option>
                <option value="Jeudi">Jeudi</option>
                <option value="Vendredi">Vendredi</option>
              </select>
              @error('jour')
                <span class="text-red-500 text-sm">{{$message}}</span>
              @enderror
            </div>
            <div>
              <label for="time" class="block text-gray-600 mb-2">Heure</label>
              <input name="time" type="text" id="time" placeholder="08:00 - 10:00" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
              @error('time')
                <span class="text-red-500 text-sm">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
             <!-- name_teacherse -->
           <div class="mb-4">
            <label for="course" class="block text-gray-700 font-semibold mb-2">cours :</label>
                  <select name="course" id="course" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                      <option value="" disabled selected>chosissez le cours</option>
                      @foreach($courses as $course)
                          <option value="{{$course->titre}}">{{$course->titre}}</option>
                      @endforeach
                  </select>
                  @error('course')
                      <span class="text-red-500 text-sm">{{$message}}</span>
                  @enderror
          </div>
             <!-- name_enseignant -->
           <div class="mb-4">
            <label for="enseignant" class="block text-gray-700 font-semibold mb-2">enseignant :</label>
                  <select name="enseignant" id="enseignant" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                      <option value="" disabled selected>chosissez l'enseignant</option>
                      @foreach($teachers as $teacher)
                          <option value="{{$teacher->name}}">{{$teacher->name}}</option>
                      @endforeach
                  </select>
                  @error('enseignant')
                      <span class="text-red-500 text-sm">{{$message}}</span>
                  @enderror
          </div>
          </div>
          <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">
              Ajouter l'Horaire
            </button>
          </div>
        </form>
      </div>
      @if($horaires->isEmpty())
        <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucun horaire disponible pour le moment, veuillez ajouter via le formulaire ci-haut</small>
        @else
      <!-- Schedule Table -->
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Liste des Horaires</h3>
        <div class="overflow-x-auto">
          <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-blue-600 text-white">
              <tr class="uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Jour</th>
                <th class="py-3 px-6 text-left">Heure</th>
                <th class="py-3 px-6 text-left">cours</th>
                <th class="py-3 px-6 text-left">Enseignant</th>
                <th class="py-3 px-6 text-left">Actions</th>
              </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
              <!-- Example Schedule -->
              @foreach($horaires as $horaire)
              <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6">{{$horaire->jours}}</td>
                <td class="py-3 px-6">{{$horaire->heure}}</td>
                <td class="py-3 px-6">{{$horaire->cours}}</td>
                <td class="py-3 px-6">{{$horaire->enseignant}}</td>
                <td class="py-3 px-6">
                  <button class="text-blue-600 hover:underline">Modifier</button> |
                  <button class="text-red-600 hover:underline">Supprimer</button>
                </td>
              </tr>
              @endforeach
              <!-- Ajouter dynamiquement -->
            </tbody>
          </table>
        </div>
      </div>
      @endif
    </div>
   
  </main>

@endsection