<!-- filepath: /c:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/categories/show.blade.php -->
@extends('layouts.app')

@section('title', 'Détails de la catégorie')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Détails de la catégorie N° {{$categorie->id}}</h1>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-gray-700 mb-4">
            <strong>Nom : </strong> {{$categorie->nom}}<br>
            <strong>Description : </strong> {{$categorie->description}}
        </p>
        <a href="{{route('categories.index')}}" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Retourner à la liste</a>
    </div>
</div>
@endsection