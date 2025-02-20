<h1>{{ $course->name }}</h1>
    <p>{{ $course->description }}</p>
    <p>Enseigné par : {{ $course->teacher_name }}</p>
    <a href="{{ route('candidatures.create', $course) }}">S'inscrire au cours</a>


    <h1>Créer une Candidature</h1>
    <form action="{{ route('candidatures.store') }}" method="POST">
        @csrf
        <label for="program_name">Nom du programme</label>
        <input type="text" name="program_name" id="program_name" required>

        <label for="motivation_letter">Lettre de motivation</label>
        <textarea name="motivation_letter" id="motivation_letter"></textarea>

        <button type="submit">Soumettre</button>
    </form>