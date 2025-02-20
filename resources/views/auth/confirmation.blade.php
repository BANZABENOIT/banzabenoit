<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="bg-gray-100 rounded-lg p-8">
  <section class="py-12">
    <div class="container mx-auto">
      <div class="bg-white rounded-lg shadow-md p-8 max-w-lg mx-auto flex flex-col">
        <small class="text-2xl font-bold text-green-600 mb-6 text-center px-12">merci de vous avoir inscrit sur notre plateforme, pour se connecter veuillez attendre l'approbation de l'administrateur en attendant un email contenant un numéro matricule dans votre boite d'emails !</small>
        
        <a href="{{ route('home') }}" class="bg-blue-600 text-white px-6 py-3 rounded font-semibold shadow hover:bg-blue-700 capitalize text-center">retour</a>
      </div>
    </div>
  </section>

</body>
</html>