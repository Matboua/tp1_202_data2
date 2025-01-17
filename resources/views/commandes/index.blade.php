<!-- filepath: /C:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/commandes/index.blade.php -->
@extends('layouts.app')

@section('title', 'Liste des Commandes')

@section('content')
<div class="container mx-auto p-4">
    <a href="{{ route('commandes.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded mb-4 inline-block">
        Ajouter une nouvelle commande
    </a>
    <h1 class="text-3xl font-bold mb-4">Liste des commandes</h1>
    <p class="text-gray-700 mb-6">Le nombre des commandes est : {{ count($commandes) }}</p>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b text-left">ID</th>
                    <th class="py-2 px-4 border-b text-left">Client ID</th>
                    <th class="py-2 px-4 border-b text-left">Date</th>
                    <th class="py-2 px-4 border-b text-left">Montant</th>
                    <th class="py-2 px-4 border-b text-left">Status</th>
                    <th class="py-2 px-4 border-b text-left" colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commandes as $commande)
                    <tr class="hover:bg-gray-50" id="commande-{{ $commande->id }}">
                        <td class="py-2 px-4 border-b">{{ $commande->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $commande->client_id }}</td>
                        <td class="py-2 px-4 border-b">{{ $commande->date }}</td>
                        <td class="py-2 px-4 border-b">{{ $commande->montant }}</td>
                        <td class="py-2 px-4 border-b">
                            <span class="
                                @if($commande->status == 'en process') bg-yellow-500 text-white font-bold px-2 rounded
                                @elseif($commande->status == 'envoyer') bg-blue-500 text-white font-bold px-2 rounded
                                @elseif($commande->status == 'livree') bg-green-500 text-white font-bold px-2 rounded
                                @endif">
                                {{ $commande->status }}
                            </span>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('commandes.show', $commande->id) }}" class="text-blue-500 hover:underline">Details</a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('commandes.edit', $commande->id) }}" class="text-yellow-500 hover:underline">Modifier</a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" class="inline delete-form" data-id="{{ $commande->id }}" data-entity="commande">
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