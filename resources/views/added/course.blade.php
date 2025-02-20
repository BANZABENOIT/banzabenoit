@extends('added.layouts.app')
@section('title', 'ajouter un cours')
@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg p-8">
        <!-- Registration Form Section -->
  <section class="py-12">
    <div class="container mx-auto">
      <div class="bg-white rounded-lg shadow-md p-8 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Ajouter un cours</h2>
        <form action="{{ route('createcourse') }}" method="POST">
         @csrf
          <!-- Full Name -->
          <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Nom complet</label>
            <input 
              type="text" 
              id="name" 
              name="name" 
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Entrez votre nom complet" >
              @error('name')  
                <span class="text-red-500 text-sm">{{ $message }}</span>  
              @enderror 
          </div>
          <!-- Course Title
           <div class="mb-4">
            <label for="course" class="block text-gray-700 font-semibold mb-2">Cours sélectionné</label>
            <input 
              type="text" 
              id="course" 
              name="course" 
              class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-100" 
              value="Titre du cours (dynamique)" 
              readonly>
          </div> -->
          
          <!-- Additional Information -->
          <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Message (facultatif)</label>
            <textarea 
              id="description" 
              name="description" 
              rows="4" 
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Ajoutez des informations supplémentaires"></textarea>
              @error('description')  
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

           <!-- id_teacher -->
           <div class="mb-4">
            <label for="teacher" class="block text-gray-700 font-semibold mb-2">enseignant :</label>
                  <select name="teacher_id" id="teacher" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                      <option value="" disabled selected>chosissez un professeur</option>
                      @foreach($teachers as $teacher)
                          <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                      @endforeach
                  </select>
                  @error('teacher_id')
                      <span class="text-red-500 text-sm">{{$message}}</span>
                  @enderror
          </div>
          
          <!-- Submit Button -->
          <div class="text-center">
            <button 
              type="submit" 
              class="bg-blue-600 text-white px-6 py-3 rounded font-semibold shadow hover:bg-blue-700">
              Soumettre l'ajout
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

@endsection