<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription au Cours</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Inscription au Cours</h2>
        <form action="" method="POST">
            @csrf
            <div class="space-y-4">
                <!-- Nom Complet -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-600">Nom Complet</label>
                    <input type="text" id="name" name="name" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Entrez votre nom complet" required>
                </div>
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-600">Adresse Email</label>
                    <input type="email" id="email" name="email" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Entrez votre email" required>
                </div>
                <!-- Cours Souhaité -->
                <div>
                    <label for="course" class="block text-sm font-medium text-gray-600">Cours Souhaité</label>
                    <select id="course" name="course" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="" disabled selected>Choisissez un cours</option>
                        <option value="programming">Programmation</option>
                        <option value="design">Design Graphique</option>
                        <option value="marketing">Marketing Digital</option>
                    </select>
                </div>
                <!-- Motivation -->
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-600">Motivation</label>
                    <textarea id="message" name="message" rows="3" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Pourquoi souhaitez-vous suivre ce cours ?" required></textarea>
                </div>
            </div>
            <!-- Bouton Soumettre -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Soumettre ma Candidature
                </button>
            </div>
        </form>
    </div>
</body>
</html>
