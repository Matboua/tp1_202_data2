<!-- filepath: /C:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/categories/index.blade.php -->
@extends('layouts.app')

@section('title', 'Liste des Categories')

@section('content')
<div class="container mx-auto p-4">
    <a href="{{ route('categories.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded mb-4 inline-block">
        Ajouter une nouvelle categorie
    </a>
    <h1 class="text-3xl font-bold mb-4">Liste des categories</h1>
    <p class="text-gray-700 mb-6">Le nombre des categories est : {{ count($categories) }}</p>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b text-left">Id</th>
                    <th class="py-2 px-4 border-b text-left">Nom</th>
                    <th class="py-2 px-4 border-b text-left">Description</th>
                    <th class="py-2 px-4 border-b text-left" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $item)
                    <tr class="hover:bg-gray-50" id="categorie-{{ $item->id }}">
                        <td class="py-2 px-4 border-b">{{ $item->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->nom }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->description }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('categories.show', $item->id) }}" class="text-blue-500 hover:underline">Details</a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('categories.edit', $item->id) }}" class="text-yellow-500 hover:underline">Modifier</a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('categories.destroy', $item->id) }}" method="POST" class="inline delete-form" data-id="{{ $item->id }}" data-entity="categorie">
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