@extends('étudiants.layouts.app')
@section('title', 'Graphique de progrès')
@section('content')

<!-- Main Content -->
<main class="py-12">
    <div class="container mx-auto">
      <h2 class="text-3xl font-semibold text-blue-600 mb-6">Mes Résultats</h2>

      <!-- Graph Section -->
      <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h3 class="text-xl font-bold mb-4">Graphique des Résultats</h3>
        <canvas id="resultChart" class="w-full"></canvas>
      </div>

      <!-- Table Section -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="px-6 py-3 text-left">Cours</th>
              <th class="px-6 py-3 text-left">Note</th>
              <th class="px-6 py-3 text-left">Statut</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b">
              <td class="px-6 py-4">Programmation</td>
              <td class="px-6 py-4">75%</td>
              <td class="px-6 py-4 text-green-600 font-bold">Réussi</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4">Mathématiques</td>
              <td class="px-6 py-4">60%</td>
              <td class="px-6 py-4 text-green-600 font-bold">Réussi</td>
            </tr>
            <tr class="border-b">
              <td class="px-6 py-4">Physique</td>
              <td class="px-6 py-4">45%</td>
              <td class="px-6 py-4 text-red-600 font-bold">Échoué</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  

  <!-- Chart Script -->
  <script>
    const ctx = document.getElementById('resultChart').getContext('2d');

    // Données fictives pour le graphique
    const data = {
      labels: ['Programmation', 'Mathématiques', 'Physique'], // Cours
      datasets: [{
        label: 'Notes (%)',
        data: [75, 60, 45], // Notes correspondantes
        backgroundColor: [
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 99, 132, 0.2)'
        ],
        borderColor: [
          'rgba(75, 192, 192, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 99, 132, 1)'
        ],
        borderWidth: 1
      }]
    };

    // Configuration du graphique
    const config = {
      type: 'bar', // Type : barre verticale
      data: data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // Initialisation du graphique
    new Chart(ctx, config);
  </script>

@endsection