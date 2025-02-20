@extends('étudiants.layouts.apps')
@section('title', 'communauté')
@section('content')

<div class="flex h-screen">
    <!-- Aside Contacts -->
    <aside class="xl:w-1/3 bg-[#E3F2FD] border-r p-4 w-full">
        <h2 class="bg-blue-600 text-white text-2xl font-semibold mb-4 p-6">Contacts Disponibles</h2>
        <div class="flex items-center border-gray-500 space-x-3 p-3">
            <img src="{{asset('storage/' . $member->photo_de_profil) }}" alt="Photo de Profil" class="w-16 h-16 rounded-full mx-auto object-cover">
            <div class="flex-1">
                <span class=" text-lg py-4  rounded block capitalize">Vous: {{ $member->name }}</span> <br>
            </div>
        </div>
        <ul>
            @foreach($contacts as $contact)
                <li class="mb-2">
                    <a href="{{ route('messages.showes', $contact->id) }}" class="block p-2 text-lg rounded capitalize {{ $contact->online ? 'bg-green-100' : 'bg-[#E3F2FD]' }}">
                        <div class="flex items-center border-gray-500 space-x-3 border-b p-3">
                            @if($contact->photo_de_profil)
                        <img src="{{asset('storage/' . $contact->photo_de_profil) }}" alt="Photo de Profil" class="w-16 h-16 rounded-full mx-auto object-cover">
                        @else
                        <img src="https://via.placeholder.com/100" alt="Photo de Profil" class="w-24 h-24 rounded-full mx-auto">
                        @endif
                        <div class="flex-1">
                        {{ $contact->name }} <br>
                        @if(!$contact->online)
                            <span class="text-sm text-gray-500">
                                @if($contact->last_seen)
                                    En Ligne Il y a :
                                    {{ \Carbon\Carbon::parse($contact->last_seen)->diffForHumans() }}
                                @else
                                    Jamais connecté
                                @endif
                            

                            </span>
                        @else
                            <span class="text-sm text-gray-600">
                                En Ligne
                            </span>
                        @endif
                        </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- Main Chat -->
    <main class="hidden md:hidden lg:hidden flex-1 xl:flex items-center justify-center">
        <p class="text-gray-500 text-lg">Sélectionnez un contact pour commencer la discussion.</p>
    </main>
</div>
@endsection
