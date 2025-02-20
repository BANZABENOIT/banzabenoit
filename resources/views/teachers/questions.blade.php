@extends('teachers.layouts.app')
@section('title', 'questions du quiz')
@section('content')

  <!-- Page Header -->
  <section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">consultez les questions pour {{$quiz->titre}}</h2>
      <p class="mt-2">voir les questions pour en etre sur afin de laisser un bon espace de travail aux étudiants.</p>
    </div>
  </section>
<main class="py-12">
    <div class="container mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="h-64 bg-gray-200"></div>
        <div class="p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-blue-600 mb-4 capitalize">Questions pour le quiz : {{ $quiz->titre }}</h1>
                <a href="{{ route('add_questions', $quiz->id) }}" class="bg-blue-600 text-white px-6 py-3 rounded font-semibold shadow hover:bg-blue-700">Ajouter une question</a>
            </div> 
            @if(empty($questions))
                <small class="text-xl text-gray-600">aucune question disponible pour cette évaluation, cliquez sur ajouter pour y ajouter des questions</small>
            @else
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 mt-4">
                @foreach ($questions as $key=> $question)
                <li>Question {{ $key+1 }} : {{ $question->question_text }}</li>

                @endforeach
            </ul>
            @endif
            </div>
            </div>
            </div>

    </div>
</main>
@endsection