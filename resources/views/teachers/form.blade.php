@extends('teachers.layouts.app')
@section('title', 'ajouter une leçon')
@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg p-8">
        <!-- Registration Form Section -->
  <section class="py-12">
    <div class="container mx-auto">
      <div class="bg-white rounded-lg shadow-md p-8 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Ajouter une leçon</h2>
        <form action="{{ route('createlesson', $course->id) }}" method="POST" enctype="multipart/form-data">
         @csrf
          <!-- Full Name -->
          <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Titre de la leçon</label>
            <input 
              type="text" 
              id="name" 
              name="name" 
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Entrez le titre de la leçon" >
              @error('name')  
                <span class="text-red-500 text-sm">{{ $message }}</span>  
              @enderror 
          </div>
          <!-- Course Title -->
           <div class="mb-4 hidden">
            <label for="course" class="block text-gray-700 font-semibold mb-2">N° du Cours sélectionné</label>
            <input 
              type="text" 
              id="course" 
              name="course" 
              class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-100" 
              value="{{$course->id}}" 
              readonly>
          </div>
          
          <!-- Additional Information -->
          <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description (facultatif)</label>
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

          <div class="mb-4">
            <label for="video" class="block text-gray-700 font-semibold mb-2">Video de la leçon</label>
            <input 
              class="hidden"
              type="file"
              id="video" 
              name="video"  
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Ajoutez des informations supplémentaires" accepted="video/*">
              @error('video')  
                <span class="text-red-500 text-sm">{{ $message }}</span>  
              @enderror 
          </div>

          <div class="mb-4">
            <label for="pdf" class="block text-gray-700 font-semibold mb-2">Document Pdf de la leçon</label>
            <input 
              class="hidden"
              type="file"
              id="pdf"
              name="pdf"  
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Ajoutez des informations supplémentaires" accepted=".pdf">
              @error('pdf')  
                <span class="text-red-500 text-sm">{{ $message }}</span>  
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