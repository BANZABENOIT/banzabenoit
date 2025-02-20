@extends('added.layouts.app')
@section('title', 'ajouter un étudiant')
@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg p-8">
        <!-- Registration Form Section -->
  <section class="py-12">
    <div class="container mx-auto">
      <div class="bg-white rounded-lg shadow-md p-8 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Ajouter un étudiant</h2>
        <form action="{{ route('createstudent') }}" method="POST">
         @csrf
          <!-- Full Name -->
          <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Nom complet</label>
            <input 
              type="text"
              id="name" 
              name="name" 
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Entrez le nom complet" >
              @error('name')  
                <span class="text-red-500 text-sm">{{ $message }}</span>  
              @enderror 
          </div>
          <!-- Email -->
          <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Adresse e-mail</label>
            <input 
              type="email" 
              id="email" 
              name="email" 
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Entrez votre e-mail" >
              @error('email')  
                <span class="text-red-500 text-sm">{{ $message }}</span>  
              @enderror 
          </div>
          <!-- matricule -->
          <div class="mb-4">
            <label for="matricule" class="block text-gray-700 font-semibold mb-2">Numéro Matricule</label>
            <input 
              type="matricule" 
              id="matricule" 
              name="matricule" 
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Entrez le numéro matricule" >
              @error('matricule')  
                <span class="text-red-500 text-sm">{{ $message }}</span>  
              @enderror 
          </div>
          <!-- Phone -->
          <div class="mb-4">
            <label for="téléphone" class="block text-gray-700 font-semibold mb-2">Numéro de téléphone</label>
            <input 
              type="tel" 
              id="téléphone" 
              name="téléphone" 
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Entrez votre numéro de téléphone" >
              @error('téléphone')  
                <span class="text-red-500 text-sm">{{ $message }}</span>  
              @enderror 
          </div>
          <!-- id_domaine -->
          <div class="mb-4">
            <label for="domaine" class="block text-gray-700 font-semibold mb-2">domaine :</label>
                  <select name="domaine_id" id="domaine" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                      <option value="" disabled selected>chosissez un domaine</option>
                      @foreach($domaines as $domaine)
                          <option value="{{$domaine->id}}">{{$domaine->name}}</option>
                      @endforeach
                  </select>
                  @error('domaine_id')
                      <span class="text-red-500 text-sm">{{$message}}</span>
                  @enderror
          </div>
          <!-- Additional Information -->
          <div class="mb-4">
            <label for="motivation" class="block text-gray-700 font-semibold mb-2">Message (facultatif)</label>
            <textarea 
              id="motivation" 
              name="motivation" 
              rows="4" 
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Ajoutez des informations supplémentaires"></textarea>
              @error('motivation')  
                <span class="text-red-500 text-sm">{{ $message }}</span>  
              @enderror 
          </div>
          
          <!-- Submit Button -->
          <div class="text-center">
            <button 
              type="submit" 
              class="bg-blue-600 text-white px-6 py-3 rounded font-semibold shadow hover:bg-blue-700">
              Soumettre l'inscription
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

@endsection