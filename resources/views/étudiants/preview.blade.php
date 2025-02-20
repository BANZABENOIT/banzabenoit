@extends('étudiants.layouts.app')
@section('title', 'votre_profil')
@section('content')

<section class="bg-blue-600 text-white py-10 mb-8">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Gestion de Votre Profil</h2>
      <p class="mt-2">Gérez votre profil en mettant à jour vos informations personnelles y compris la suppression du compte.</p>
    </div>
  </section>

<div class="flex flex-col items-center space-y-4">
    <p class="text-gray-600">Aperçu de votre photo :</p>

    <div class="w-32 h-32 bg-gray-300 rounded-full overflow-hidden">
        <img src="{{ asset('storage/' . $imagePath) }}" class="w-full h-full object-cover">
    </div>

    <!-- Formulaire pour valider l'image -->
    <form action="{{ route('profile.update') }}" method="POST" class="flex flex-col space-y-2">
        @csrf
        <input type="hidden" name="imagePath" value="{{ $imagePath }}">
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg">Ajouter au profil</button>
    </form>

    <a href="{{ route('profil') }}" class="text-blue-600">Changer d'image</a>
</div>
@endsection
