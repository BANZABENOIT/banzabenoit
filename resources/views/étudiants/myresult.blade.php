<h1>Vos résultats</h1>
    <ul>
        @foreach ($results as $result)
            <li>
                Quiz : {{ $result->quiz->title }} - Score : {{ $result->score }}
            </li>
        @endforeach
    </ul>

    <h1>Vos résultats</h1>
    <ul>
        @foreach ($results as $result)
            <li>
                Quiz : {{ $result->quiz->title }} - Score : {{ $result->score }} / {{ $result->quiz->questions->count() }}
            </li>
        @endforeach
    </ul>
