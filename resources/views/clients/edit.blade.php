<!-- filepath: /c:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/clients/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Modifier le client')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Modifier le client ayant l'id N° {{$client->id}}</h1>
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('clients.update', $client->id)}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prenom :</label>
            <input type="text" id="prenom" name="prenom" value="{{old('prenom', $client->prenom)}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom :</label>
            <input type="text" id="nom" name="nom" value="{{old('nom', $client->nom)}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Telephone :</label>
            <input type="text" id="telephone" name="telephone" value="{{old('telephone', $client->telephone)}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="ville" class="block text-gray-700 text-sm font-bold mb-2">Ville :</label>
            <input type="text" id="ville" name="ville" value="{{old('ville', $client->ville)}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="date_naissance" class="block text-gray-700 text-sm font-bold mb-2">Date Naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance" value="{{old('date_naissance', $client->date_naissance)}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier</button>
            <a href="{{ route('clients.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Retour à la liste des Clients
            </a>
        </div>
    </form>
</div>
@endsection