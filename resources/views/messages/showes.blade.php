@extends('étudiants.layouts.apps')
@section('title', 'communauté')
@section('content')

<div class="flex h-screen">
    <!-- Aside Contacts -->
    <aside class="w-1/3 bg-[E3F2FD] border-r p-4 xl:flex flex-col hidden md:hidden lg:hidden">
        <h2 class="bg-blue-600 text-white text-2xl font-semibold mb-4 p-6">Contacts Disponibles</h2>
        <div class="flex items-center border-gray-500 space-x-3 p-3">
            <img src="{{asset('storage/' . $authmember->photo_de_profil) }}" alt="Photo de Profil" class="w-16 h-16 rounded-full mx-auto object-cover">
            <div class="flex-1">
                <span class=" text-lg py-4  rounded block capitalize">Vous: {{ $authmember->name }}</span> <br>
            </div>
        </div>
        <ul>
            @foreach($contacts as $contact)
                <li class="mb-2">
                    <a href="{{ route('messages.showes', $contact->id) }}" class="block p-2 text-lg rounded capitalize {{ $contact->online ? 'bg-green-100' : 'bg-[#E3F2FD]' }}">
                    <div class="flex items-center border-gray-500 space-x-3 border-b p-3">
                        <img src="{{asset('storage/' . $contact->photo_de_profil) }}" alt="Photo de Profil" class="w-16 h-16 rounded-full mx-auto object-cover">
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
    <main class="bg-white flex-1 flex flex-col">
        <header class="bg-blue-600 text-white flex justify-center items-center py-4">
            <div>
                <div class="flex items-center border-gray-500 space-x-3 p-3">
                    <img src="{{asset('storage/' . $member->photo_de_profil) }}" alt="Photo de Profil" class="w-24 h-24 rounded-full mx-auto object-cover">
                    <div class="flex-1">
                        <h2 class="capitalize text-lg">contact : {{$member->name}} <br> <p class="lowercase">{{$member->email}}</p> <p>{{ $member->role }}</p></h2>
                    </div>
                </div>
            </div>
        </header>
        <div class="flex-1 p-4 overflow-y-auto space-y-4">
        @foreach($messages as $message)
                @if($message->sender_id === $authmember->member_id)
                    <!-- Message de l'utilisateur connecté (aligné à droite, fond bleu) -->
                    <div class="flex justify-end items-center">
                    <div class="flex items-center border-gray-500 space-x-3 p-3">
                        <div class="bg-blue-600 text-white p-3 rounded-lg max-w-xs">
                            <p class="text-lg">{{ $message->content }}</p>
                            <span class="text-xs text-white opacity-80">{{ $message->created_at->format('H:i') }}</span>
                            @if($message->read_at)
                                <span class="text-xs text-green-500 ml-2">✔✔ Lu</span>
                            @else
                                <span class="text-xs text-gray-500 ml-2">✔ Envoyé</span>
                            @endif

                        </div>
                        <div class="flex-1">
                        <img src="{{asset('storage/' . $authmember->photo_de_profil) }}" alt="Photo de Profil" class="w-12 h-12 rounded-full mx-auto object-cover">
                        </div>
                        </div>
                        
                    </div>
                
                @elseif($message->receiver_id === $authmember->member_id)
                        <!-- Message reçu (aligné à gauche, fond blanc) -->
                        <div class="flex items-center">
                        <div class="flex items-center border-gray-500 space-x-3 p-3">
                            <img src="{{asset('storage/' . $member->photo_de_profil) }}" alt="Photo de Profil" class="w-12 h-12 rounded-full mx-auto object-cover">
                            <div class="flex-1">
                            <div class="bg-[#f2f2f2] p-3 rounded-lg max-w-xs">
                                <p class="text-lg">{{ $message->content }}</p>
                                <span class="text-xs text-gray-500">{{ $message->created_at->format('H:i') }}</span>
                            </div>
                            </div>
                            </div>
                        </div>
                @endif
            @endforeach
        </div>

        <!-- Formulaire d'envoi de message -->
        <form method="POST" action="{{ route('messages.stores', $member->id) }}" class="border-t p-4 flex">
            @csrf
            <input type="text" name="content" class="bg-gray-100 text-gray-600 w-full p-2 border rounded" placeholder="Écrire un message..." required>
            <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded">Envoyer</button>
        </form>
    </main>
</div>
@endsection
