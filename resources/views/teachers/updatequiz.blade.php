<h1>Modifier le quiz</h1>
    <form action="{{ route('teacher.quizzes.update', $quiz->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="{{ $quiz->title }}" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description">{{ $quiz->description }}</textarea>
        </div>
        <div>
            <label for="lesson_id">Leçon :</label>
            <select name="lesson_id" id="lesson_id" required>
                @foreach ($lessons as $lesson)
                    <option value="{{ $lesson->id }}" @if ($lesson->id == $quiz->lesson_id) selected @endif>
                        {{ $lesson->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
