@extends('teachers.layouts.app')
@section('title', 'étudiants inscrits')
@section('content')

  <!-- Page Header -->
  <section class="bg-blue-600 text-white py-10">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold">Consultez Vos Étudiants Inscrits à Vos Cours</h2>
      <p class="mt-2">Trouvez les étudiants inscrits pour apprendre vos cours tout au long de leur parcours et les aider à avoir une connaissance de qualité.</p>
    </div>
  </section>

      <!-- Main Content -->
  <main class="py-12">
    <div class="container mx-auto">
      <!-- Header Section -->
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold text-blue-600">Étudiants Inscrits</h2>
        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Ajouter un étudiant</a>
      </div>

      <!-- Student List -->
      <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300">
          <thead class="bg-blue-600 text-white">
            <tr >
              <th class="border border-gray-300 px-4 py-2 text-left">N°</th>
              <th class="border border-gray-300 px-4 py-2 text-left">Nom de l'Étudiant</th>
              <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
              <th class="border border-gray-300 px-4 py-2 text-left">Cours</th>
              <th class="border border-gray-300 px-4 py-2 text-left">Date d'Inscription</th>
              <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Exemple d'étudiants -->
             @foreach($students as $key =>$student)
            <tr>
              <td class="border border-gray-300 px-4 py-2">{{$key+1}}</td>
              <td class="border border-gray-300 px-4 py-2">{{$student->name}}</td>
              <td class="border border-gray-300 px-4 py-2">{{$student->email}}</td>
              <td class="border border-gray-300 px-4 py-2">{{$student->course_name}}</td>
              <td class="border border-gray-300 px-4 py-2">{{$student->created_at->format('Y-m-d')}}</td>
              <td class="border border-gray-300 px-4 py-2">
                <a href="#" class="text-blue-600 hover:underline">Voir</a> |
                <a href="#" class="text-red-600 hover:underline">Supprimer</a>
              </td>
            </tr>
            @endforeach
            <!-- <tr>
              <td class="border border-gray-300 px-4 py-2">2</td>
              <td class="border border-gray-300 px-4 py-2">Florence Kit</td>
              <td class="border border-gray-300 px-4 py-2">Florence.Kit@example.com</td>
              <td class="border border-gray-300 px-4 py-2">Développement Web</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-21</td>
              <td class="border border-gray-300 px-4 py-2">
                <a href="#" class="text-blue-600 hover:underline">Voir</a> |
                <a href="#" class="text-red-600 hover:underline">Supprimer</a>
              </td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </div>
  </main>


@endsection