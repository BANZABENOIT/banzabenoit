@extends('admins.layouts.app')
@section('title', 'inscriptionx_aux_cours')
@section('content') 

 <!-- Hero Section -->
 <section class="bg-blue-600 text-white py-20">
    <div class="container mx-auto text-center">
      <h2 class="text-4xl font-bold mb-4">Apprenez à votre rythme, où que vous soyez</h2>
      <p class="text-lg mb-2">Explorez une variété de cours adaptés à vos besoins et développez vos compétences dès aujourd'hui.</p>
    </div>
  </section>

  <main class="py-12">
    <div class="container mx-auto">
    @if($enrollments->isEmpty())
      <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucune inscription en attente est disponible</small>
    @else
      <h2 class="text-3xl font-semibold text-blue-600 mb-6">Inscriptions aux cours</h2>

      <!-- Table -->
      <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full table-auto">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="px-6 py-3 text-left">N°</th>
              <th class="px-6 py-3 text-left">Etudiant</th>
              <th class="px-6 py-3 text-left">Cours</th>
              <th class="px-6 py-3 text-left">Date</th>
              <th class="px-6 py-3 text-left">Statut</th>
              <th class="px-6 py-3 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>  
            @foreach($enrollments as $key =>$enrollment)
                <tr class="border-b">
                <td class="px-6 py-4">{{$key+1}}</td>
                <td class="px-6 py-4">{{$enrollment->student->name}}</td>
                <td class="px-6 py-4">{{$enrollment->course_name}}</td>
                <td class="px-6 py-4">{{$enrollment->created_at->format('Y - m - d | H:i:s')}}</td>
                <td class="px-6 py-4">{{$enrollment->status}}</td>
                <td class="px-6 py-4">
                    @if($enrollment->status == 'en_attente')
                    <a href="#" class="text-green-600 hover:underline">Approuver</a> |
                    <a href="#" class="text-red-600 hover:underline">Rejeter</a>
                    @else
                    <a href="#" class="text-blue-600 hover:underline">voir détails</a>
                    @endif
                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif
        <br> <br>
      @if($candidatures->isEmpty())
      <small class="flex justify-center items-center text-2xl text-gray-600 font-bold ml-8">Aucune candidature en attente est disponible</small>
    @else
      <h2 class="text-3xl font-semibold text-blue-600 mb-6">candidatures à la plateforme</h2>

      <!-- Table -->
      <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full table-auto">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="px-6 py-3 text-left">N°</th>
              <th class="px-6 py-3 text-left">Etudiant</th>
              <th class="px-6 py-3 text-left">programme</th>
              <th class="px-6 py-3 text-left">Date</th>
              <th class="px-6 py-3 text-left">Statut</th>
              <th class="px-6 py-3 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>  
            @foreach($candidatures as $key =>$candidature)
            <tr class="border-b">
              <td class="px-6 py-4">{{$key+1}}</td>
              <td class="px-6 py-4">{{$candidature->member->name}}</td>
              <td class="px-6 py-4">{{$candidature->domaine->name}}</td>
              <td class="px-6 py-4">{{$candidature->created_at->format('Y - m - d | H:i:s')}}</td>
              <td class="px-6 py-4">{{$candidature->status}}</td>
              <td class="px-6 py-4">
                @if($candidature->status == 'en_attente')
                <form action="{{route('approuverCand', $candidature->id)}}" method= "POST">
                  @csrf
                  <button type="submit" class="text-green-600 hover:underline">Approuver</button>
                </form> |
                    <a href="#" class="text-red-600 hover:underline">Rejeter</a>
                @else
                    <a href="#" class="text-blue-600 hover:underline">voir détails</a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif
    
    </div>
  </main>

@endsection