@extends('étudiants.layouts.app')
@section('title', 'Profil')
@section('content')

<section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Gestion de Votre Profil</h2>
      <p class="mt-2">Gérez votre profil en mettant à jour vos informations personnelles y compris la suppression du compte.</p>
    </div>
  </section>
  
  <!-- Profile Section -->
  <section class="py-12">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center">Gestion de Profil</h2>
      <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Profile Form -->
          <!-- Photo de Profil -->
          <div class="mb-6 text-center">
            @if(!$student->photo_de_profil)
              <div class="flex items-center justify-center cursor-pointer">
                <div class="relative w-24 h-24 flex items-center justify-center bg-gray-300 rounded-full">
                  <div class="w-6 h-6 border-4 border-white rounded-full"></div>
                  <div class="absolute w-12 h-4 bg-white rounded-t-full bottom-4"></div>
                </div>
              </div>
             
            @else
            <img src="{{asset('storage/' . $student->photo_de_profil) }}" alt="Photo de Profil" class="w-32 h-32 rounded-full mx-auto object-cover">
            
            @endif
          </div>
          <!-- Full Name -->
          <div class="mb-4">
            <label for="full_name" class="block text-md font-medium text-gray-700">Nom Complet :</label>
            <input 
              type="text" 
              id="full_name" 
              name="full_name" 
              class="mt-1 p-3 block w-full uppercase border-gray-300 rounded-md shadow-md focus:ring-blue-500 focus:border-blue-500" 
              readonly 
              value="{{$student->name}}">
          </div>

          <!-- Email -->
          <div class="mb-4">
            <label for="email" class="block text-md font-medium text-gray-700">Adresse Email :</label>
            <input 
              type="email" 
              id="email" 
              name="email" 
              class="mt-1 block p-3 w-full border-gray-300 rounded-md shadow-md focus:ring-blue-500 focus:border-blue-500" 
              readonly 
              value="{{$student->email}}">
          </div>

          <!-- Phone -->
          <div class="mb-4">
            <label for="phone" class="block text-md font-medium text-gray-700">Numéro de Téléphone :</label>
            <input 
              type="text" 
              id="phone" 
              name="phone" 
              class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-md focus:ring-blue-500 focus:border-blue-500" 
              readonly
              value="{{$student->phone_number}}">
          </div>

          <!-- Password -->
          <div class="mb-4">
            <label for="password" class="block text-md font-medium text-gray-700">Matricule :</label>
            <input 
              type="text" 
              id="password" 
              name="password" 
              readonly
              class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-md focus:ring-blue-500 focus:border-blue-500" 
              value="{{$student->matricule}}">
          </div>

          
      </div>


      <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Profile Form -->
        <form action="{{route('profile.preview')}}" method="POST" enctype="multipart/form-data">
          <!-- Photo de Profil -->
          @csrf
          <div class="mb-6 text-center">
            @if(!$student->photo_de_profil)
              <div class="flex items-center justify-center cursor-pointer">
                <div class="relative w-24 h-24 flex items-center justify-center bg-gray-300 rounded-full">
                  <div class="w-6 h-6 border-4 border-white rounded-full"></div>
                  <div class="absolute w-12 h-4 bg-white rounded-t-full bottom-4"></div>
                </div>
              </div>
              <label for="photo" class="block text-blue-600 mt-2 cursor-pointer hover:underline">
                Ajouter une photo de profil
              </label>
              <input type="file" id="photo" name="photo" accept="image/*" class="p-2 border hidden rounded-lg">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Suivant</button>
            @else
            <img src="{{asset('storage/' . $student->photo_de_profil) }}" alt="Photo de Profil" class="w-32 h-32 rounded-full mx-auto object-cover">
            <label for="photo" class="block text-blue-600 mt-2 cursor-pointer hover:underline">
              Modifier la photo de profil
            </label>
            <input type="file" id="photo" name="photo" accept="image/*" class="p-2 border hidden rounded-lg">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Suivant</button>
            @endif
            @error('photo')  
              <span class="text-red-500 text-sm">{{ $message }}</span>  
            @enderror 
           
          </div>
        </form>
        <form action="">
          <!-- Full Name -->
          <div class="mb-4">
            <label for="full_name" class="block text-sm font-medium text-gray-700">Nom Complet</label>
            <input 
              type="text" 
              id="full_name" 
              name="full_name" 
              class="mt-1 uppercase block w-full border-gray-300 rounded-md shadow-lg p-4 focus:ring-blue-500 focus:border-blue-500" 
              placeholder="{{$student->name}}" 
              value="{{$student->name}}">
          </div>

          <!-- Email -->
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse Email :</label>
            <input 
              type="email" 
              id="email" 
              name="email" 
              class="mt-1 block w-full border-gray-300 rounded-md shadow-lg p-4 focus:ring-blue-500 focus:border-blue-500" 
              placeholder="{{$student->email}}" 
              value="{{$student->email}}">
          </div>

          <!-- Phone -->
          <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Numéro de Téléphone :</label>
            <input 
              type="text" 
              id="phone" 
              name="phone" 
              class="mt-1 block w-full p-4 border-gray-300 rounded-md shadow-lg focus:ring-blue-500 focus:border-blue-500" 
              placeholder="{{$student->phone_number}}" 
              value="{{$student->phone_number}}">
          </div>

          <!-- Submit Button -->
          <div class="mt-6">
            <button 
              type="submit" 
              class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
              Mettre à Jour
            </button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </section>

  
@endsection