@extends('admins.layouts.app')
@section('title', 'notifications')
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
        <h2 class="text-3xl font-semibold text-blue-600">Gestion des Notifications</h2>
        <p class="text-gray-600">Créer, modifier ou supprimer des notifications pour les utilisateurs.</p>
      </div>

      <!-- Add Notification -->
      <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Créer une Nouvelle Notification</h3>
        <form action="{{ route('createnotification') }}" method="POST">
        @csrf
          <div class="mb-4">
            <label for="title" class="block text-gray-600 mb-2">Titre</label>
            <input 
              name="title"
              type="text" 
              id="title" 
              placeholder="Titre de la notification" 
              class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
            />
            @error('title')
              <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
          <div class="mb-4">
            <label for="content" class="block text-gray-600 mb-2">Contenu</label>
            <textarea 
            name="content"
              id="content" 
              rows="4" 
              placeholder="Contenu de la notification" 
              class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
            ></textarea>
            @error('content')
              <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
          <div class="mb-4">
            <label for="target_group" class="block text-gray-600 mb-2">Audience</label>
            <select 
              name="target_group"
              id="target_group" 
              class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
            >
              <option value="">Sélectionner une Audience</option>
              <option value="All">Tous les utilisateurs</option>
              <option value="Students">Étudiants uniquement</option>
              <option value="Teachers">Enseignants uniquement</option>
            </select>
            @error('target_group')
              <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
          <button 
            type="submit" 
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">
            Envoyer la Notification
          </button>
        </form>
      </div>

      @if($notifications->isEmpty())
      <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucune notification disponible pour vous, veuillez patienter l'ajout par des corps administratifs</small>
    @else

      <!-- Notifications Table -->
      <div class="bg-white rounded-lg shadow-md overflow-x-auto">
        <table class="min-w-full bg-white">
          <thead class="bg-blue-600 text-white">
            <tr class="uppercase text-sm leading-normal">
              <th class="py-3 px-6 text-left">N°</th>
              <th class="py-3 px-6 text-left">Titre</th>
              <th class="py-3 px-6 text-left">Contenu</th>
              <th class="py-3 px-6 text-left">Audience</th>
              <th class="py-3 px-6 text-center">Actions</th>
            </tr>
          </thead>
          <tbody class="text-gray-700 text-sm font-light">
            <!-- Exemple de notification -->
             @foreach ($notifications as $key => $notification)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
              <td class="py-3 px-6 text-left whitespace-nowrap">{{ $key+1 }}</td>
              <td class="py-3 px-6 text-left whitespace-nowrap">
                <span class="font-medium">{{$notification->titre}}</span>
              </td>
              <td class="py-3 px-6 text-left">
                <span>{{$notification->content}}</span>
              </td>
              <td class="py-3 px-6 text-left">
                <span>{{$notification->target_group}}</span>
              </td>
              <td class="py-3 px-6 text-center">
                <div class="flex item-center justify-center space-x-4">
                  <button class="text-blue-500 hover:underline">Modifier</button>
                  <button class="text-red-500 hover:underline">Supprimer</button>
                </div>
              </td>
            </tr>
            <!-- Répéter ce bloc pour chaque notification -->
            <!-- <tr class="border-b border-gray-200 hover:bg-gray-100">
              <td class="py-3 px-6 text-left whitespace-nowrap">
                <span class="font-medium">Lien vers la base de données</span>
              </td>
              <td class="py-3 px-6 text-left">
                <span>content de la notification</span>
              </td>
              <td class="py-3 px-6 text-left">
                <span>target_group</span>
              </td>
              <td class="py-3 px-6 text-center">
                <div class="flex item-center justify-center space-x-4">
                  <button class="text-blue-500 hover:underline">Modifier</button>
                  <button class="text-red-500 hover:underline">Supprimer</button>
                </div>
              </td>
            </tr> -->
            @endforeach
          </tbody>
        </table>
      </div>
      @endif
    </div>
  </main>

@endsection