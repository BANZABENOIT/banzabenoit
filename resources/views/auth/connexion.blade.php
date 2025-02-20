<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>
<body class="bg-gray-100">  
    <div class="flex items-center justify-center min-h-screen">  
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">  
            <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Connexion</h2>
            @if(session('error'))
                <div class="text-red-500 text-center fond-bold">
                    <span>{{ session('error')}}</span>
                </div>
            @endif
            <form method="POST" action="{{ route('connexion') }}">  
                @csrf  
                <div class="mb-4">  
                    <label for="email" class="block mb-2 text-sm text-gray-600">Email</label>  
                    <input type="email" name="email" id="email"  
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300"  
                        placeholder="Votre email">  
                    @error('email')  
                    <span class="text-red-500 text-sm">{{ $message }}</span>  
                    @enderror  
                </div>  
                <div class="mb-6">  
                    <label for="matricule" class="block mb-2 text-sm text-gray-600">Matricule</label>  
                    <input type="matricule" name="matricule" id="matricule"  
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300"  
                        placeholder="Votre matricule">  
                    @error('matricule') 
                    <span class="text-red-500 text-sm">{{ $message }}</span>  
                    @enderror  
                </div>  
                <button type="submit"  
                    class="w-full px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-500 focus:outline-none">Se  connecter</button>  
            </form>  
            <p class="mt-4 text-sm text-center text-gray-600">vous n'etes pas membre dans la plateforme? <a href="{{ route('register') }}"  
                    class="text-blue-600">Inscrivez-vous ici</a></p>  
        </div>  
    </div>  
</body>
</html>
