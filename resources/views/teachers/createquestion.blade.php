@extends('teachers.layouts.app')
@section('title', 'ajouter une leçon')
@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg p-8">
        <!-- Registration Form Section -->
  <section class="py-12">
    <div class="container mx-auto">
      <div class="bg-white rounded-lg shadow-md p-8 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Ajouter une question pour le quiz : {{ $quiz->titre }}</h2>
                <form action="{{ route('addquiz', $quiz->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="question_text" class="block text-gray-700 font-semibold mb-2">Question :</label>
                        <input type="text" name="question_text" id="question_text" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"
                        placeholder="entrez la question">
                        @error('question_text')  
                            <span class="text-red-500 text-sm">{{ $message }}</span>  
                        @enderror 
                    </div>
                    <!-- quiz Title -->
                    <div class="mb-4 hidden">
                        <label for="quiz" class="block text-gray-700 font-semibold mb-2">N° du Quiz sélectionné</label>
                        <input 
                        type="text" 
                        id="quiz" 
                        name="quiz" 
                        class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-100" 
                        value="{{$quiz->id}}" 
                        readonly>
                    </div>
                    <div class="mb-4">
                        <label for="option_a" class="block text-gray-700 font-semibold mb-2">Option A :</label>
                        <input type="text" name="option_a" id="option_a" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"
                        placeholder="entrez la première option">
                        @error('option_a')  
                            <span class="text-red-500 text-sm">{{ $message }}</span>  
                        @enderror 
                    </div>
                    <div class="mb-4">
                        <label for="option_b" class="block text-gray-700 font-semibold mb-2">Option B :</label>
                        <input type="text" name="option_b" id="option_b" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"
                        placeholder="entrez la deuxième option">
                        @error('option_b')  
                            <span class="text-red-500 text-sm">{{ $message }}</span>  
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="option_c" class="block text-gray-700 font-semibold mb-2">Option C :</label>
                        <input type="text" name="option_c" id="option_c" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"
                        placeholder="entrez la troisième option">
                        @error('option_c')  
                            <span class="text-red-500 text-sm">{{ $message }}</span>  
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="option_d" class="block text-gray-700 font-semibold mb-2">Option D :</label>
                        <input type="text" name="option_d" id="option_d" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"
                        placeholder="entrez la quatrième option">
                        @error('option_d')  
                            <span class="text-red-500 text-sm">{{ $message }}</span>  
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="correct_option" class="block text-gray-700 font-semibold mb-2">Bonne réponse :</label>
                        <select name="correct_option" id="correct_option" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                            <option value="" disabled selected>chosissez une option correcte</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        @error('correct_option')  
                            <span class="text-red-500 text-sm">{{ $message }}</span>  
                        @enderror
                    </div>
                    <div class="text-center">
                        <button 
                        type="submit" 
                        class="bg-blue-600 text-white px-6 py-3 rounded font-semibold shadow hover:bg-blue-700">
                        Ajouter
                        </button>
                    </div>
                </form>

        </div>
    </div>
  </section>
@endsection
