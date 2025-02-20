@extends('teachers.layouts.app')
@section('title', 'mes évaluations')
@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg p-8">
    <!-- Registration Form Section -->
    <section class="py-12">
        <div class="container mx-auto">
            <div class="bg-white rounded-lg shadow-md p-8 max-w-lg mx-auto">
            <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Créer un quiz</h2>
        <form action="{{route('createquizs', $lesson->id)}}" method="POST">
         @csrf

         <!-- id_lesson -->
            <div class="mb-4">
                <label for="lesson" class="block text-gray-700 font-semibold mb-2 hidden">leçon :</label>
                <input 
              type="text" 
              id="lesson_id" 
              name="lesson_id" 
              class="hidden w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              value="{{$lesson->id}}"  readonly>
                  @error('lesson_id')
                      <span class="text-red-500 text-sm">{{$message}}</span>
                  @enderror
          </div>

          <!-- Full Name -->
          <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Titre de l'évaluation</label>
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

         

          
          
          <!-- Submit Button -->
          <div class="text-center">
            <button 
              type="submit" 
              class="bg-blue-600 text-white px-6 py-3 rounded font-semibold shadow hover:bg-blue-700">
              Créer
            </button>
          </div>
        </form>
        </div>
        </div>
    </section>
</div>
@endsection