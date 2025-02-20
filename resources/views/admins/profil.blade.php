@extends('admins.layouts.app')
@section('title', 'Profil')
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
        <h2 class="text-3xl font-semibold text-blue-600">Mon Profil</h2>
        <p class="text-gray-600">Gérez vos informations personnelles et votre mot de passe.</p>
      </div>

      <!-- Profile Form -->
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Informations Personnelles</h3>

        <div class="mb-6 text-center">
          @if(!$admin->photo_de_profil)
              <div class="flex items-center justify-center cursor-pointer">
                <div class="relative w-32 h-32 flex items-center justify-center bg-gray-300 rounded-full">
                  <div class="w-8 h-8 border-4 border-white rounded-full"></div>
                  <div class="absolute w-16 h-6 bg-white rounded-t-full bottom-5"></div>
                </div>
              </div>
             
            @else
            <img src="{{asset('storage/' . $admin->photo_de_profil) }}" alt="Photo de Profil" class="w-32 h-32 rounded-full mx-auto object-cover">
            
            @endif
          </div>
        
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="name" class="block text-gray-600 mb-2">Nom Complet</label>
              <input 
                type="text" 
                id="name" 
                readonly
                value="{{$admin->name}}" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
              />
            </div>
            <div>
              <label for="email" class="block text-gray-600 mb-2">Email</label>
              <input 
                type="email" 
                id="email" 
                readonly 
                value="{{$admin->email}}" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
              />
            </div>
          </div>
          <div class="mt-6">
            <label for="phone" class="block text-gray-600 mb-2">Téléphone</label>
            <input 
              type="text" 
              id="phone" 
              readonly 
              value="{{$admin->phone_number}}" 
              class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
            />
          </div>
          <div class="mt-6">
            <label for="phone" class="block text-gray-600 mb-2">Matricule</label>
            <input 
              type="text" 
              id="phone" 
              readonly 
              value="{{$admin->matricule}}" 
              class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
            />
          </div>
          
        
      </div>


      <div class="bg-white p-6 rounded-lg shadow-md mt-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Informations Personnelles</h3>

        <form action="{{route('profile.previewa')}}" method="POST" enctype="multipart/form-data">
          <!-- Photo de Profil -->
          @csrf
          
        
          <div class="mb-6 text-center">
            @if(!$admin->photo_de_profil)
              <div class="flex items-center justify-center cursor-pointer">
                <div class="relative w-32 h-32 flex items-center justify-center bg-gray-300 rounded-full">
                  <div class="w-8 h-8 border-4 border-white rounded-full"></div>
                  <div class="absolute w-16 h-6 bg-white rounded-t-full bottom-5"></div>
                </div>
              </div>
              <label for="photo" class="block text-blue-600 mt-2 cursor-pointer hover:underline">
                Ajouter une photo de profil
              </label>
              <input type="file" id="photo" name="photo" accept="image/*" class="p-2 border hidden rounded-lg">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Suivant</button>
            @else
            <img src="{{asset('storage/' . $admin->photo_de_profil) }}" alt="Photo de Profil" class="w-32 h-32 rounded-full mx-auto object-cover">
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

        <form>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          
            <div>
              <label for="name" class="block text-gray-600 mb-2">Nom Complet</label>
              <input 
                type="text" 
                id="name" 
                placeholder="{{$admin->name}}" 
                value="{{$admin->name}}" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
              />
            </div>
            <div>
              <label for="email" class="block text-gray-600 mb-2">Email</label>
              <input 
                type="email" 
                id="email" 
                placeholder="{{$admin->email}}" 
                value="{{$admin->email}}" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
              />
            </div>
          </div>
          <div class="mt-6">
            <label for="phone" class="block text-gray-600 mb-2">Téléphone</label>
            <input 
              type="text" 
              id="phone" 
              placeholder="{{$admin->phone_number}}" 
              value="{{$admin->phone_number}}" 
              class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
            />
          </div>
          <div class="mt-6">
            <button 
              type="submit" 
              class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">
              Mettre à Jour
            </button>
          </div>
        </form>
      </div>

      <!-- Change Password -->
      <!-- <div class="bg-white p-6 rounded-lg shadow-md mt-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Changer le Mot de Passe</h3>
        <form>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="current-password" class="block text-gray-600 mb-2">Mot de Passe Actuel</label>
              <input 
                type="password" 
                id="current-password" 
                placeholder="Mot de passe actuel" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
              />
            </div>
            <div>
              <label for="new-password" class="block text-gray-600 mb-2">Nouveau Mot de Passe</label>
              <input 
                type="password" 
                id="new-password" 
                placeholder="Nouveau mot de passe" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
              />
            </div>
          </div>
          <div class="mt-6">
            <label for="confirm-password" class="block text-gray-600 mb-2">Confirmer le Nouveau Mot de Passe</label>
            <input 
              type="password" 
              id="confirm-password" 
              placeholder="Confirmer le nouveau mot de passe" 
              class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
            />
          </div>
          <div class="mt-6">
            <button 
              type="submit" 
              class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">
              Mettre à Jour le Mot de Passe
            </button>
          </div>
        </form>
      </div> -->
    </div>
  </main>

@endsection