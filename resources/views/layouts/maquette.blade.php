<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>maquette</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesone/6.0.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <section class="bg-teal-100">
        <header class="bg-white shadow-md">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <a href="#" class="text-purple-700 font-bold text-xl">Wrangle</a>
                <nav class="hidden md:flex space-x-6">
                <a href="#features" class="text-gray-700 hover:text-purple-700">Features</a>
                <a href="#pricing" class="text-gray-700 hover:text-purple-700">Pricing</a>
                <a href="#about" class="text-gray-700 hover:text-purple-700">About</a>
                </nav>
                <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-700 hover:text-purple-700">Log in</a>
                <a href="#"
                    class="bg-purple-700 text-white py-2 px-4 rounded-md hover:bg-purple-800 transition">Get Started</a>
                </div>
            </div>
        </header>

        <section class="bg-gray-50 py-16">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
                <!-- Texte -->
                <div class="md:w-1/2">
                <h1 class="text-4xl font-bold text-gray-800 leading-tight">
                    Approval and Ticketing Workflows in Slack
                </h1>
                <p class="mt-4 text-gray-600">
                    Automate your Slack requests, manage approvals, and create seamless workflows with ease.
                </p>
                <div class="mt-6">
                    <a href="#"
                    class="bg-purple-700 text-white py-3 px-6 rounded-md hover:bg-purple-800 transition">Schedule a Demo</a>
                </div>
                </div>
                <!-- Image -->
                <div class="md:w-1/2 mt-8 md:mt-0">
                <img src="https://via.placeholder.com/500x300" alt="Illustration"
                    class="rounded-lg shadow-lg">
                </div>
            </div>
        </section>

        <section class="bg-white py-8">
            <div class="container mx-auto px-4">
                <p class="text-center text-gray-600 text-sm uppercase">Trusted by great companies</p>
                <div class="flex justify-center items-center space-x-8 mt-6">
                <!-- Logos des entreprises -->
                <img src="https://via.placeholder.com/100x50" alt="Logo 1">
                <img src="https://via.placeholder.com/100x50" alt="Logo 2">
                <img src="https://via.placeholder.com/100x50" alt="Logo 3">
                <img src="https://via.placeholder.com/100x50" alt="Logo 4">
                <img src="https://via.placeholder.com/100x50" alt="Logo 5">
                </div>
            </div>
        </section>

        <section class="bg-gray-50 py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-gray-800 text-center">We Automate Slack Requests</h2>
                <p class="text-center text-gray-600 mt-4">Effortlessly manage approvals and automate tasks.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                    <!-- Carte 1 -->
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                        <div class="text-purple-700 mb-4">
                            <!-- Icône -->
                            <svg class="w-12 h-12 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.518a6 6 0 00-11.856 0m11.856 0A8.001 8.001 0 0112 20a8.001 8.001 0 01-7.428-4.482m14.856 0A8.001 8.001 0 0112 4a8.001 8.001 0 017.428 4.482M12 14l.867-.5M11.133 13.5L12 14l.867-.5M12 14l-.867.5M11.133 13.5L12 14m-.867-.5V11m0 0h1.734M12 11l-.867-.5" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">IT</h3>
                        <p class="mt-2 text-gray-600">Streamline IT requests with fast approvals.</p>
                    </div>
                    <!-- Carte 2 -->
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                        <div class="text-purple-700 mb-4">
                            <!-- Icône -->
                            <svg class="w-12 h-12 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 10l-7 7-7-7" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">HR</h3>
                        <p class="mt-2 text-gray-600">Automate employee onboarding and approvals.</p>
                    </div>
                    <!-- Carte 3 -->
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                        <div class="text-purple-700 mb-4">
                            <!-- Icône -->
                            <svg class="w-12 h-12 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Finance</h3>
                        <p class="mt-2 text-gray-600">Manage financial approvals and streamline requests.</p>
                    </div>
                </div>
            </div>
        </section>


        <section class="bg-white py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-gray-800 text-center">Hear What Our Clients Say</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                    <!-- Témoignage 1 -->
                    <div class="bg-gray-50 shadow-md rounded-lg p-6">
                        <p class="text-gray-600 italic">"Wrangle has transformed our Slack workflows. Highly recommended!"</p>
                        <p class="mt-4 text-gray-800 font-bold">- Jane Doe</p>
                    </div>
                    <!-- Témoignage 2 -->
                    <div class="bg-gray-50 shadow-md rounded-lg p-6">
                        <p class="text-gray-600 italic">"A seamless integration that saves us hours every week."</p>
                        <p class="mt-4 text-gray-800 font-bold">- John Smith</p>
                    </div>
                    <!-- Témoignage 3 -->
                    <div class="bg-gray-50 shadow-md rounded-lg p-6">
                        <p class="text-gray-600 italic">"The best ticketing solution for our team. Simply amazing."</p>
                        <p class="mt-4 text-gray-800 font-bold">- Sarah Lee</p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="bg-gray-50 py-12 border-t border-gray-200">
            <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Colonne 1 : Logo et description -->
                <div>
                    <a href="#" class="text-purple-700 text-2xl font-bold">Wrangle</a>
                    <p class="mt-4 text-gray-600 text-sm">
                        Wrangle helps teams simplify workflows and streamline ticketing processes directly in Slack.
                    </p>
                </div>

                <!-- Colonne 2 : Liens rapides -->
                <div>
                    <h3 class="text-gray-800 font-semibold text-lg">Quick Links</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-purple-700 transition">Home</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-purple-700 transition">Features</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-purple-700 transition">Pricing</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-purple-700 transition">Contact</a></li>
                    </ul>
                </div>

                <!-- Colonne 3 : Suivez-nous -->
                <div>
                    <h3 class="text-gray-800 font-semibold text-lg">Follow Us</h3>
                    <div class="flex mt-4 space-x-4">
                        <a href="#" class="text-gray-600 hover:text-purple-700 transition">
                            <!-- Icône Facebook -->
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 8H7v4H4v4h3v8h4v-8h3.64L15 12h-4V9a1 1 0 011-1h3V4h-3c-3.33 0-6 2.67-6 6v3z" />
                            </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-purple-700 transition">
                            <!-- Icône Twitter -->
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0016.29 2a4.48 4.48 0 00-4.43 5.48A12.94 12.94 0 013 4s-4 9 5 13a13 13 0 01-7 2c9 5.5 20 0 20-11.5a8.69 8.69 0 00-.08-1.29A4.72 4.72 0 0023 3z" />
                            </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-purple-700 transition">
                            <!-- Icône LinkedIn -->
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                d="M16 8a6 6 0 016 6v8h-4v-8a2 2 0 00-4 0v8h-4v-8a6 6 0 016-6zM2 9h4v12H2z" />
                                <circle cx="4" cy="4" r="2" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bas de page -->
            <div class="mt-8 text-center text-gray-500 text-sm">
                &copy; 2024 Wrangle. All Rights Reserved.
            </div>
        </footer>


    </section>
</body>
</html>