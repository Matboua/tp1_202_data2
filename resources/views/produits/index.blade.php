<!-- filepath: /C:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/produits/index.blade.php -->
@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
<div class="container mx-auto p-4">
    <a href="{{ route('produits.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded mb-4 inline-block">
        Ajouter un nouveau produit
    </a>
    <h1 class="text-3xl font-bold mb-4">Liste des produits</h1>
    
    <!-- Filter Form -->
    <form action="{{ route('produits.index') }}" method="GET" class="mb-4">
        <div class="flex items-center">
            <label for="categorie" class="mr-2">Filtrer par catégorie:</label>
            <select name="categorie" id="categorie" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ request('categorie') == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom }}</option>
                @endforeach
            </select>
            <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Filtrer</button>
        </div>
    </form>
    
    <p class="text-gray-700 mb-6">Le nombre des produits est : {{ count($produits) }}</p>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b text-left">Id</th>
                    <th class="py-2 px-4 border-b text-left">Nom</th>
                    <th class="py-2 px-4 border-b text-left">Prix</th>
                    <th class="py-2 px-4 border-b text-left">Quantité</th>
                    <th class="py-2 px-4 border-b text-left">Description</th>
                    <th class="py-2 px-4 border-b text-left">Categorie</th>
                    <th class="px-4 py-2">Image</th>
                    <th class="py-2 px-4 border-b text-left" colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produits as $produit)
                    <tr class="hover:bg-gray-50" id="produit-{{ $produit->id }}">
                        <td class="py-2 px-4 border-b">{{ $produit->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $produit->nom }}</td>
                        <td class="py-2 px-4 border-b">{{ $produit->prix }}</td>
                        <td class="py-2 px-4 border-b">{{ $produit->quantite }}</td>
                        <td class="py-2 px-4 border-b">{{ $produit->description }}</td>
                        <td class="py-2 px-4 border-b">{{ $produit->categorie->nom }}</td>
                        <td class="border px-4 py-2"> <img src="{{$produit->image}}" alt="Product"/></td>
                        <!-- Image   -->
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('produits.show', $produit->id) }}" class="text-blue-500 hover:underline">Details</a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('produits.edit', $produit->id) }}" class="text-yellow-500 hover:underline">Modifier</a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="inline delete-form" data-id="{{ $produit->id }}" data-entity="produit">
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