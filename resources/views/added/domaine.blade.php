@extends('added.layouts.app')
@section('title', 'ajouter un admin')
@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg p-8">
        <!-- Registration Form Section -->
  <section class="py-12">
    <div class="container mx-auto">
      <div class="bg-white rounded-lg shadow-md p-8 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Ajouter un domaine</h2>
        <form action="{{ route('createdomaine') }}" method="POST">
         @csrf
          <!-- Full Name -->
          <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Nom du domaine</label>
            <input 
              type="text" 
              id="name" 
              name="name" 
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Entrez le nom du domaine" >
              @error('name')  
                <span class="text-red-500 text-sm">{{ $message }}</span>  
              @enderror 
          </div>
          <!-- Additional Information -->
          <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description (facultatif)</label>
            <textarea 
              id="description" 
              name="description" 
              rows="4" 
              class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
              placeholder="Ajoutez des informations supplémentaires"></textarea>
              @error('description')  
                <span class="text-red-500 text-sm">{{ $message }}</span>  
              @enderror 
          </div>
          <!-- id_admin -->
          <div class="mb-4">
            <label for="admin" class="block text-gray-700 font-semibold mb-2">superviseur :</label>
                  <select name="admin_id" id="admin" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                      <option value="" disabled selected>chosissez un superviseur</option>
                      @foreach($admins as $admin)
                          <option value="{{$admin->id}}">{{$admin->name}}</option>
                      @endforeach
                  </select>
                  @error('admin_id')
                      <span class="text-red-500 text-sm">{{$message}}</span>
                  @enderror
          </div>
          <!-- Submit Button -->
          <div class="text-center">
            <button 
              type="submit" 
              class="bg-blue-600 text-white px-6 py-3 rounded font-semibold shadow hover:bg-blue-700">
              Soumettre l'ajout
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

@endsection