@extends('teachers.layouts.app')
@section('title', 'Notifications')
@section('content')

  <!-- Page Header -->
  <section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Explorez Vos Notifications</h2>
      <p class="mt-2">Ayez L'habitude De Lire Les Notifications Afin D'etre Informer à Toutes les Nouvelles De La Plateforme.</p>
    </div>
  </section>

  <!-- Main Content -->
  <main class="py-12">
    <div class="container mx-auto">
      <!-- Header Section -->
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold text-blue-600">Notifications</h2>
        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tout marquer comme lu</a>
      </div>
      @if($notifications->isEmpty())
      <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucune notification disponible pour vous, veuillez patienter l'ajout par des corps administratifs</small>
    @else
      <!-- Notifications List -->
      <div class="bg-white p-6 rounded-lg shadow-md">
        <ul class="divide-y divide-gray-300">
          <!-- Exemple de notification -->
          @foreach($notifications as $notification)
          <li class="py-4 flex justify-between items-center">
            <div>
              <p class="text-sm text-gray-600">[{{$notification->created_at->format('Y-m-d')}}]</p>
              <p class="text-lg font-medium text-gray-800">{{$notification->titre}} : {{$notification->content}}.</p>
            </div>
            <a href="#" class="text-blue-600 hover:underline">Voir</a>
          </li>
          @endforeach
          <!-- <li class="py-4 flex justify-between items-center">
            <div>
              <p class="text-sm text-gray-600">2024-12-20</p>
              <p class="text-lg font-medium text-gray-800">Mise à jour : Les horaires pour le cours "Développement Web" ont été modifiés.</p>
            </div>
            <a href="#" class="text-blue-600 hover:underline">Voir</a>
          </li> -->
          <!-- <li class="py-4 flex justify-between items-center">
            <div>
              <p class="text-sm text-gray-600">2024-12-18</p>
              <p class="text-lg font-medium text-gray-800">Message de l'administration : Nouvelle politique sur les évaluations.</p>
            </div>
            <a href="#" class="text-blue-600 hover:underline">Voir</a>
          </li> -->
        </ul>
      </div>
      @endif
    </div>
  </main>


@endsection