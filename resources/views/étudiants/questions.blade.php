@extends('étudiants.layouts.app')
@section('title', 'Graphique de progrès')
@section('content')

<h1>Quiz : {{ $quiz->title }}</h1>
    <form action="{{ route('student.quizzes.submit', $quiz->id) }}" method="POST">
        @csrf
        @foreach ($quiz->questions as $question)
            <div>
                <p>{{ $question->question_text }}</p>
                <label>
                    <input type="radio" name="question_{{ $question->id }}" value="A">
                    {{ $question->option_a }}
                </label>
                <label>
                    <input type="radio" name="question_{{ $question->id }}" value="B">
                    {{ $question->option_b }}
                </label>
                @if ($question->option_c)
                    <label>
                        <input type="radio" name="question_{{ $question->id }}" value="C">
                        {{ $question->option_c }}
                    </label>
                @endif
                @if ($question->option_d)
                    <label>
                        <input type="radio" name="question_{{ $question->id }}" value="D">
                        {{ $question->option_d }}
                    </label>
                @endif
            </div>
        @endforeach
        <button type="submit">Soumettre</button>
    </form>


@endsection