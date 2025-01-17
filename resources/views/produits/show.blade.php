<!-- filepath: /c:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/produits/show.blade.php -->
@extends('layouts.app')

@section('title', 'Détails du produit')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Détails du produit N° {{$produit->id}}</h1>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-gray-700 mb-4">
            <strong>Id : </strong> {{$produit->id}}<br>
            <strong>Nom : </strong> {{$produit->nom}}<br>
            <strong>Prix : </strong> {{$produit->prix}}<br>
            <strong>Quantité : </strong> {{$produit->quantite}}<br>
            <strong>Description : </strong> {{$produit->description}}<br>
            <strong>Categorie : </strong> {{$produit->categorie->nom}}
        </p>
        <div class="mb-4">
            <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" style="max-width: 100%;">
        </div>
        <a href="{{route('produits.index')}}" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
            Retourner à la liste des Produits
        </a>
    </div>
</div>
@endsection