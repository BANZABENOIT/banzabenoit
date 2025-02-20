@extends('étudiants.layouts.app')
@section('title', 'notifications')
@section('content')

<section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Explorez Vos Notifications</h2>
      <p class="mt-2">Trouvez les notifications disponibles pour vous afin d'etre informer à l'évolution de la plateforme et de vos connaissances.</p>
    </div>
  </section>

      <!-- Notifications Section -->
  <section class="py-12">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center">Mes Notifications</h2>
      <div class="bg-white rounded-lg shadow-md p-8">
        <!-- Notifications List -->
        @if($notifications->isEmpty())
      <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucune notification disponible pour vous, veuillez patienter l'ajout par des corps administratifs</small>
    @else
        <ul class="space-y-4">
          <!-- Example Notification (Replace with dynamic data) -->
           @foreach($notifications as $notification)
          <li class="border-b pb-4">
            <p class="text-gray-700">
              <span class="font-bold">[{{$notification->created_at->format('d/m/Y')}}]</span> {{$notification->content}} <span class="font-semibold text-blue-600"></span><span class="text-green-600 font-semibold"></span>.
            </p>
            <a href="#" class="text-blue-600 hover:underline">Voir Détails</a>
          </li>
          <!-- <li class="border-b pb-4">
            <p class="text-gray-700">
              <span class="font-bold">[18 Décembre 2024]</span> Les résultats de l'examen pour le cours <span class="font-semibold text-blue-600">"Développement Web"</span> sont disponibles. Vous avez obtenu <span class="font-semibold text-green-600">85%</span>.
            </p>
            <a href="#" class="text-blue-600 hover:underline">Voir Résultats</a>
          </li>
          <li class="border-b pb-4">
            <p class="text-gray-700">
              <span class="font-bold">[15 Décembre 2024]</span> Votre inscription au cours <span class="font-semibold text-blue-600">"Mathématiques Avancées"</span> est en attente d'approbation.
            </p>
          </li> -->
          <!-- <li>
            <p class="text-gray-700">
              <span class="font-bold">[10 Décembre 2024]</span> Une nouvelle annonce a été publiée pour le cours <span class="font-semibold text-blue-600">"Algorithmique"</span>.
            </p>
            <a href="#" class="text-blue-600 hover:underline">Lire l'annonce</a>
          </li> -->
          @endforeach
        </ul>
        @endif
      </div>
    </div>
  </section>


@endsection