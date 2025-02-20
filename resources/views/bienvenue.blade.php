<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - Éducation en Ligne</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-r from-purple-500 via-blue-500 to-indigo-500 text-white font-sans">
    <div class="min-h-screen flex flex-col items-center justify-center min-w-screen">
        <!-- Hero Section -->
        <div class="text-center px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Bienvenue sur <span class="text-yellow-400">Éducation en Ligne</span></h1>
            <p class=" mb-8">
                Une plateforme dédiée à l'apprentissage en ligne, offrant des cours de qualité, des outils modernes, 
                et une communauté pour soutenir votre parcours éducatif.
            </p>
            <div class="flex space-x-4 justify-center">
                <a href="{{ route('register') }}" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300">
                    <i class="fas fa-user-plus mr-2"></i> S'inscrire
                </a>
                <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300">
                    <i class="fas fa-sign-in-alt mr-2"></i> Se Connecter
                </a>
            </div>
        </div>

        <!-- Features Section -->
        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
            <div class="bg-white bg-opacity-10 p-6 rounded-lg text-center shadow-md">
                <i class="fas fa-chalkboard-teacher text-yellow-400 text-4xl mb-4"></i>
                <div class="rounded-full bg-purple-100 p-4 mx-auto w-60 h-60 flex items-center justify-center mb-5">
                    <span class="text-purple-600 text-6xl font-bold">10K</span>
                </div>
                <h3 class="text-2xl font-bold mb-2">Des Cours Interactifs</h3>
                <p>Apprenez avec des vidéos, des quiz et des projets pratiques conçus par des experts.</p>
            </div>
            <div class="bg-white bg-opacity-10 p-6 rounded-lg text-center shadow-md">
                <i class="fas fa-users text-yellow-400 text-4xl mb-4"></i>
                <div class="rounded-full bg-purple-100 p-4 mx-auto w-60 h-60 flex items-center justify-center mb-5">
                    <span class="text-purple-600 text-6xl font-bold">12K</span>
                </div>
                <h3 class="text-2xl font-bold mb-2">Communauté Active</h3>
                <p>Rejoignez une communauté d'apprenants et d'enseignants pour échanger et progresser.</p>
            </div>
            <div class="bg-white bg-opacity-10 p-6 rounded-lg text-center shadow-md">
                <i class="fas fa-award text-yellow-400 text-4xl mb-4"></i>
                <div class="rounded-full bg-purple-100 p-4 mx-auto w-60 h-60 flex items-center justify-center mb-5">
                    <span class="text-purple-600 text-6xl font-bold">15K</span>
                </div>
                <h3 class="text-2xl font-bold mb-2">Certifications</h3>
                <p>Obtenez des certificats reconnus pour booster votre carrière et vos compétences.</p>
            </div>
        </div>
    </div>
</body>
</html>