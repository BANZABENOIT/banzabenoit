<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>@yield('title', 'laravel app')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-">
    <header class="head md:w-full h-[15vh] bg-[#222] flex items-center justify-between p-4 relative">
        <h1 class="logo uppercase text-white font-semibold text-5xl">BKcompany</h1>
        <ul class="hidden flex md:flex items-center justify-evenly gap-4 w-[50%] text-white text-2xl">
            <li><a href="" class="hover:text-[#007bc4] capitalize">Accueil</a></li>
            <li><a href="" class="hover:text-[#007bc4] capitalize">produits</a></li>
            <li><a href="" class="hover:text-[#007bc4] capitalize">services</a></li>
            <li><a href="" class="hover:text-[#007bc4] capitalize">about us</a></li>
            <li><a href="" class="hover:text-[#007bc4] capitalize">support</a></li>
            <li><a href="" class="hover:text-[#007bc4] capitalize">contact</a></li>
        </ul>
        <div class="connexion text-white capitalize">
            <button class="px-8 py-3 rounded-xl bg-blue-600 hover:bg-purple-600 capitalize">sign up</button>
            <button class="px-8 py-3 rounded-xl bg-blue-600 hover:bg-purple-600 capitalize">log in</button>
        </div>
    </header>

    <main class="body bg-[#888]"> 
        @yield('content')
    </main>

    <footer id="footer" class="section footer pl-10">
        <div class="container">
            <div class="footer-container">
                <div class="footer-center">
                    <h3>ENTREPRISE</h3>
                    <a href="#">Marque</a>
                    <a href="#">Code promo</a>
                    <a href="#">offre spécial</a>
                    <a href="#">Affilié</a>
                    <a href="#">Carte du site</a>
                </div>
                <div class="footer-center">
                    <h3>MON COMPTE</h3>
                    <a href="#">Mon compte</a>
                    <a href="#">Historique des commandes</a>
                    <a href="#">Liste des Produits</a>
                    <a href="#">Affilié</a>
                    <a href="#">Carte du site</a>
                </div>
                <div class="footer-center">
                    <h3>INFORMATION</h3>
                    <a href="#">A propos de nous</a>
                    <a href="#">Politique de confidentialité</a>
                    <a href="#">Règles & Conditions</a>
                    <a href="#">Contactez-nous</a>
                    <a href="#">Notre Equipe</a>
                </div>
                <div class="footer-center">
                    <h3>CONTACTEZ-NOUS</h3>
                    <div>
                        <span>
                            <i class="fa-solid fa-location-dot"></i>
                        </span>
                        Avenue Alarm, Bujumbura,bi
                    </div>
                    <div>
                        <span>
                            <i class="fa-solid fa-phone-volume"></i>
                        </span>
                        257 66502921
                    </div>
                    <div>
                        <span>
                            <i class="fa-sharp fa-solid fa-envelope"></i>
                        </span>
                        banzaservice@gmail.com
                    </div>
                    <div>
                        <span>
                            <i class="fa-solid fa-paper-plane"></i>
                        </span>
                        Bujumbura, Burundi
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            Copyright 2024: Tous droits reservés 
            <a href="#">BanzaBenoit</a>
        </div>
    </footer>
</body>
</html>