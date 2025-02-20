<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'CampusConnect')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
  

  <!-- Navbar -->
  <header class="bg-white shadow-md ">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <h1 class="text-2xl font-bold text-blue-600">CampusConnect</h1>
      <nav class="relative">
        <ul class="hidden flex md:hidden lg:hidden xl:flex space-x-6">
          <li><a href="{{route('student')}}" class="{{ Route::currentRouteName() == 'student' ? 'text-blue-600' : 'text-gray-600' }} hover:text-blue-600">Accueil</a></li>
          <li><a href="{{route('cours')}}" class="{{ Route::currentRouteName() == 'cours' ? 'text-blue-600' : 'text-gray-600' }} hover:text-blue-600">Cours disponibles</a></li>
          <li><a href="{{route('allowed')}}" class="{{ Route::currentRouteName() == 'allowed' ? 'text-blue-600' : 'text-gray-600' }} hover:text-blue-600">Cours approuvés</a></li>
          <li><a href="{{route('horaires')}}" class="{{ Route::currentRouteName() == 'horaires' ? 'text-blue-600' : 'text-gray-600' }} hover:text-blue-600">horaires</a></li>
          <li><a href="{{route('quiz')}}" class="{{ Route::currentRouteName() == 'quiz' ? 'text-blue-600' : 'text-gray-600' }} hover:text-blue-600">Evaluations</a></li>
          <li><a href="{{route('notification')}}" class="{{ Route::currentRouteName() == 'notification' ? 'text-blue-600' : 'text-gray-600' }} hover:text-blue-600">Notifications</a></li>
          <li><a href="{{route('profil')}}" class="{{ Route::currentRouteName() == 'profil' ? 'text-blue-600' : 'text-gray-600' }} hover:text-blue-600">Profil</a></li>
          <form action="{{route('logouts')}}" method="post">
            @csrf
            <input type="hidden">
            <button class="hover:text-blue-600 cursor-pointer" type="submit">Déconnexion</button>
          </form>
        </ul>
      </nav>

      
      <div class="relative xl:hidden">
        <!-- Bouton du menu hamburger -->
        <button
          id="menu-button"
          class="flex flex-col justify-between w-8 h-8 focus:outline-none"
          onclick="toggleMenu()"
          >
          <span class="block w-full h-1 bg-black transition-transform duration-300"></span>
          <span class="block w-full h-1 bg-black transition-opacity duration-300"></span>
          <span class="block w-full h-1 bg-black transition-transform duration-300"></span>
        </button>

        <!-- Menu -->
        <div
          id="menu"
          class="absolute flex flex-col justify-center items-center top-12 right-[-40px] h-[100vh] w-[80vh] bg-slate-100 shadow-lg rounded-lg p-4 hidden"
         >
          <ul class="flex flex-col justify-center items-center space-y-6">
            <li><a href="{{route('student')}}" class="hover:text-blue-600">Accueil</a></li>
              <li><a href="{{route('cours')}}" class="hover:text-blue-600">Cours disponibles</a></li>
              <li><a href="{{route('allowed')}}" class="hover:text-blue-600">Cours approuvés</a></li>
              <li><a href="{{route('horaires')}}" class="hover:text-blue-600">horaires</a></li>
              <li><a href="{{route('quiz')}}" class="hover:text-blue-600">Evaluations</a></li>
              <li><a href="{{route('notification')}}" class="hover:text-blue-600">Notifications</a></li>
              <li><a href="{{route('profil')}}" class="hover:text-blue-600">Profil</a></li>
              <form action="{{route('logouts')}}" method="post">
                @csrf
                <input type="hidden">
                <button class="hover:text-blue-600 cursor-pointer" type="submit">Déconnexion</button>
              </form>
          </ul>

        </div>
      </div>
    </div>
  </header>

  <!-- Main Content Area -->
  <main class="py-12">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto text-center">
      <p>&copy; {{ date('Y') }} CampusConnect. Tous droits réservés.</p>
    </div>
  </footer>

  <script>
    function toggleMenu() {
  const menu = document.getElementById("menu");
  const button = document.getElementById("menu-button");
  const spans = button.querySelectorAll("span");

  // Basculer l'affichage du menu
  menu.classList.toggle("hidden");

  // Animer les barres du bouton hamburger
  spans[0].classList.toggle("rotate-45");
  spans[1].classList.toggle("-rotate-45");
  spans[2].classList.toggle("opacity-0");
}

   
    // button.addEventListener("click", function () {
    //   menu.classList.toggle("hidden");
      
    // });
  </script>

</body>
</html>