<h1>Résultats pour le quiz : {{ $quiz->title }}</h1>
    <ul>
        @foreach ($results as $result)
            <li>
                Étudiant : {{ $result->student->name }} - Score : {{ $result->score }}
            </li>
        @endforeach
    </ul>
