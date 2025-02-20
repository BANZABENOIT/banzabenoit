<h1>Quizzes disponibles</h1>
    <ul>
        @foreach ($quizzes as $quiz)
            <li>
                {{ $quiz->title }}
                <a href="{{ route('student.quizzes.show', $quiz->id) }}">Commencer</a>
            </li>
        @endforeach
    </ul>
