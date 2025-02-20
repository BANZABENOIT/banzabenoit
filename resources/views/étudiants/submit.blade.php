@extends('étudiants.layouts.app')
@section('title', 'soumission du Quiz')
@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg p-8">
    <!-- Registration Form Section -->
    <section class="py-12">
        <div class="container mx-auto">
            <div class="bg-white rounded-lg shadow-md p-8 max-w-lg mx-auto">
            <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Quiz : {{ $quiz->titre }}</h2>
            
    <form action="{{route('questionsubmit', $quiz->id)}}" method="POST">
        @csrf
        @foreach ($questions as $key=> $question)
            <div class="container mx-auto">
                <p class="text-md font-bold text-gray-600 mb-6 text-center">Question {{ $key+1 }}: {{ $question->question_text }}</p>
                <label class="block text-gray-700 font-semibold capitalize mb-2">
                    <input type="radio" name="question_{{ $question->id }}" value="A">
                    {{ $question->option_a }}
                </label>
                <label class="block text-gray-700 font-semibold capitalize mb-2">
                    <input type="radio" name="question_{{ $question->id }}" value="B">
                    {{ $question->option_b }}
                </label>
                @if ($question->option_c)
                    <label class="block text-gray-700 font-semibold capitalize mb-2">
                        <input type="radio" name="question_{{ $question->id }}" value="C">
                        {{ $question->option_c }}
                    </label>
                @endif
                @if ($question->option_d)
                    <label class="block text-gray-700 font-semibold capitalize mb-2">
                        <input type="radio" name="question_{{ $question->id }}" value="D">
                        {{ $question->option_d }}
                    </label>
                @endif
            </div>
            @if(session('error'))
                <div class="text-red-500 text-center fond-bold">
                    <span>{{ session('error') }}</span>
                </div>
            @endif
        @endforeach
        <!-- Submit Button -->
        <div class="text-center mt-6">
            <button 
              type="submit" 
              class="bg-blue-600 text-white px-6 py-3 rounded font-semibold shadow hover:bg-blue-700">
              Soumettre
            </button>
          </div>
    </form>
    </div>
        </div>
    </section>
</div>
@endsection