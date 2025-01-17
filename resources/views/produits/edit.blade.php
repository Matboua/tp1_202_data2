<!-- filepath: /c:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/produits/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Modifier un produit')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Modifier un produit</h1>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Other input fields -->
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom :</label>
                <input type="text" name="nom" id="nom" value="{{ $produit->nom }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description :</label>
                <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $produit->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="prix" class="block text-gray-700 text-sm font-bold mb-2">Prix :</label>
                <input type="text" name="prix" id="prix" value="{{ $produit->prix }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="quantite" class="block text-gray-700 text-sm font-bold mb-2">Quantité :</label>
                <input type="number" name="quantite" id="quantite" value="{{ $produit->quantite }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="categorie_id" class="block text-gray-700 text-sm font-bold mb-2">Categorie Id :</label>
                <select name="categorie_id" id="categorie_id" class="shadow appearance-none border rounded w-full py-2 px-3 mb-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image :</label>
                <input type="file" name="image" id="image" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>  



            
            <div class="flex items-center justify-between">
                <input type="submit" value="Mettre à jour" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                <a href="{{ route('produits.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Retour à la liste des Produits
                </a>
            </div>
        </form>
    </div>
</div>
@endsection