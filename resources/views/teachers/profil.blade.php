@extends('teachers.layouts.app')
@section('title', 'profil')
@section('content')

  <!-- Page Header -->
  <section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Explorez Nos Cours Disponibles</h2>
      <p class="mt-2">Trouvez le cours qui correspond à vos besoins et commencez votre apprentissage dès aujourd'hui.</p>
    </div>
  </section>

      <!-- Main Content -->
  <main class="py-12">
    <div class="container mx-auto max-w-4xl">
      <!-- Header Section -->
      <div class="flex items-center mb-8">
        <h2 class="text-3xl font-semibold text-blue-600">Mon Profil</h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Profile Form -->
      <div class="bg-white p-6 rounded-lg shadow-md">
        
          <!-- Photo de Profil -->
          <div class="mb-6 text-center">
          @if(!$teacher->photo_de_profil)
              <div class="flex items-center justify-center cursor-pointer">
                <div class="relative w-24 h-24 flex items-center justify-center bg-gray-300 rounded-full">
                  <div class="w-6 h-6 border-4 border-white rounded-full"></div>
                  <div class="absolute w-12 h-4 bg-white rounded-t-full bottom-4"></div>
                </div>
              </div>
             
            @else
            <img src="{{asset('storage/' . $teacher->photo_de_profil) }}" alt="Photo de Profil" class="w-32 h-32 rounded-full mx-auto object-cover">
            
            @endif
          </div>

          <!-- Nom Complet -->
          <div class="mb-6">
            <label for="name" class="block text-gray-700 font-medium">Nom Complet</label>
            <input type="text" id="name" name="name" value="{{$teacher->name}}" 
                   class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                   readonly>
          </div>

          <!-- Email -->
          <div class="mb-6">
            <label for="email" class="block text-gray-700 font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{$teacher->email}}" 
                   class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                   readonly>
          </div>

          <div class="mb-6">
          <label for="phone" class="block font-medium text-gray-700">Numéro de Téléphone :</label>
            <input 
              type="text" 
              id="phone" 
              name="phone" 
              class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
              readonly
              value="{{$teacher->phone_number}}">
          </div>

          <!-- Mot de Passe -->
          <div class="mb-6">
          <label for="name" class="block text-gray-700 font-medium">Matricule</label>

          <input 
              type="text" 
              id="password" 
              name="password" 
              readonly
              class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
              value="{{$teacher->matricule}}">
            </div>

          
        
      </div>
      <!-- Profile Form -->
      <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{route('profile.previewet')}}" method="POST" enctype="multipart/form-data">
          <!-- Photo de Profil -->
          @csrf
          
        
          <div class="mb-6 text-center">
            @if(!$teacher->photo_de_profil)
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
            <img src="{{asset('storage/' . $teacher->photo_de_profil) }}" alt="Photo de Profil" class="w-32 h-32 rounded-full mx-auto object-cover">
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

          <!-- Nom Complet -->
          <div class="mb-6">
            <label for="name" class="block text-gray-700 font-medium">Nom Complet</label>
            <input type="text" id="name" name="name" value="{{$teacher->name}}" 
                   class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                   
          </div>

          <!-- Email -->
          <div class="mb-6">
            <label for="email" class="block text-gray-700 font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{$teacher->email}}" 
                   class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
          </div>

          <div class="mb-6">
          <label for="phone" class="block font-medium text-gray-700">Numéro de Téléphone :</label>
            <input 
              type="text" 
              id="phone" 
              name="phone" 
              class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
              placeholder="{{$teacher->phone_number}}" 
              value="{{$teacher->phone_number}}">
          </div>

          <!-- Boutons -->
          <div class="flex justify-between items-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
              Enregistrer
            </button>
            <a href="#" class="text-red-600 hover:underline">Supprimer mon compte</a>
          </div>
        </form>
      </div>
      </div>
    </div>
  </main>


@endsection