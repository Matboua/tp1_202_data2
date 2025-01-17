<!-- filepath: /C:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/clients/index.blade.php -->
@extends('layouts.app')

@section('title', 'Liste des Clients')

@section('content')
<div class="container mx-auto p-4">
    <a href="{{ route('clients.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded mb-4 inline-block">
        Ajouter un nouveau client
    </a>
    <h1 class="text-3xl font-bold mb-4">Liste des clients</h1>
    <p class="text-gray-700 mb-6">Le nombre des clients est : {{ count($clients) }}</p>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b text-left">Id</th>
                    <th class="py-2 px-4 border-b text-left">Prenom</th>
                    <th class="py-2 px-4 border-b text-left">Nom</th>
                    <th class="py-2 px-4 border-b text-left">Telephone</th>
                    <th class="py-2 px-4 border-b text-left">Ville</th>
                    <th class="py-2 px-4 border-b text-left">Date Naissance</th>
                    <th class="py-2 px-4 border-b text-left" colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr class="hover:bg-gray-50" id="client-{{ $client->id }}">
                        <td class="py-2 px-4 border-b">{{ $client->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $client->prenom }}</td>
                        <td class="py-2 px-4 border-b">{{ $client->nom }}</td>
                        <td class="py-2 px-4 border-b">{{ $client->telephone }}</td>
                        <td class="py-2 px-4 border-b">{{ $client->ville }}</td>
                        <td class="py-2 px-4 border-b">{{ $client->date_naissance }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('clients.show', $client->id) }}" class="text-blue-500 hover:underline">Details</a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('clients.edit', $client->id) }}" class="text-yellow-500 hover:underline">Modifier</a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline delete-form" data-id="{{ $client->id }}" data-entity="client">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Supprimer" class="text-red-500 hover:underline cursor-pointer">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection