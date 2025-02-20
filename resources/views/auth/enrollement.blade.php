@extends('étudiants.layouts.app')
@section('title', 'inscription au cours')
@section('content')

    
  <!-- Registration Form Section -->
  <section class="py-12">
    <div class="container mx-auto">
      <div class="bg-white rounded-lg shadow-md p-8 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Inscription au Cours : {{ $course->titre }}</h2>
        <form action="{{ route('inscriptioncours', $course->id) }}" method="POST">
        @csrf
          <!-- Full Name -->
          <div class="mb-4">
            <label for="full_name" class="block text-gray-700 font-semibold mb-2">Nom complet</label>
            <input 
              type="text" 
              id="full_name" 
              name="full_name" 
              class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-600" 
              value="{{$student->name}}" 
              readonly>
          </div>
          <!-- Email -->
          <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Adresse e-mail</label>
            <input 
              type="email" 
              id="email" 
              name="email" 
              class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-600" 
              value="{{$student->email}}" 
              readonly>
          </div>
          <!-- Phone -->
          <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-semibold mb-2">Numéro de téléphone</label>
            <input 
              type="tel" 
              id="phone" 
              name="phone" 
              class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-600" 
              value="{{$student->phone_number}}" 
              readonly>
          </div>
          <!-- Course Title -->
          <div class="mb-4">
            <label for="course" class="block text-gray-700 font-semibold mb-2">Cours sélectionné</label>
            <input 
              type="text" 
              id="course" 
              name="course" 
              class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-100" 
              value="{{$course->titre}}" 
              readonly>
          </div>
          <!-- Additional Information -->
          <div class="mb-4">
            <label for="message" class="block text-gray-700 font-semibold mb-2">Message (facultatif)</label>
            <textarea 
              id="message" 
              name="message" 
              rows="4" 
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Ajoutez des informations supplémentaires"></textarea>
              @error('message')  
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