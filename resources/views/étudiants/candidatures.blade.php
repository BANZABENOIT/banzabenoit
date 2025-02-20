<h1>Mes Candidatures</h1>
    <ul>
        @foreach ($candidatures as $candidature)
            <li>{{ $candidature->course->name }} - Statut : {{ $candidature->status }}</li>
        @endforeach
    </ul>
