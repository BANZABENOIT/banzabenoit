<h1>Ajouter une question pour le quiz : {{ $quiz->title }}</h1>
    <form action="{{ route('teacher.questions.store', $quiz->id) }}" method="POST">
        @csrf
        <div>
            <label for="question_text">Question :</label>
            <input type="text" name="question_text" id="question_text" required>
        </div>
        <div>
            <label for="option_a">Option A :</label>
            <input type="text" name="option_a" id="option_a" required>
        </div>
        <div>
            <label for="option_b">Option B :</label>
            <input type="text" name="option_b" id="option_b" required>
        </div>
        <div>
            <label for="option_c">Option C :</label>
            <input type="text" name="option_c" id="option_c">
        </div>
        <div>
            <label for="option_d">Option D :</label>
            <input type="text" name="option_d" id="option_d">
        </div>
        <div>
            <label for="correct_option">Bonne réponse :</label>
            <select name="correct_option" id="correct_option" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
        <button type="submit">Ajouter</button>
    </form>
