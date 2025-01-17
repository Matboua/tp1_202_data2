<!-- filepath: /c:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/commandes/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Modifier la commande')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Modifier la commande N° {{$commande->id}}</h1>
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('commandes.update', $commande->id)}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status :</label>
            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="en process" {{ $commande->status == 'en process' ? 'selected' : '' }}>En Process</option>
            <option value="envoyer" {{ $commande->status == 'envoyer' ? 'selected' : '' }}>Envoyer</option>
            <option value="livree" {{ $commande->status == 'livree' ? 'selected' : '' }}>Livree</option>
            </select>
        </div>
        
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier</button>
            <a href="{{route('commandes.index')}}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Retourner à la liste des Commandes
            </a>
        </div>
    </form>
</div>
@endsection