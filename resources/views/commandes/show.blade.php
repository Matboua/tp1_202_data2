<!-- filepath: /c:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/commandes/show.blade.php -->
@extends('layouts.app')

@section('title', 'Détails de la commande')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Détails de la commande N° {{$commande->id}}</h1>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-gray-700 mb-4">
            <strong>Id : </strong> {{$commande->id}}<br>
            <strong>Client Id : </strong> {{$commande->client_id}}<br>
            <strong>Date : </strong> {{$commande->date}}<br>
            <strong>Montant : </strong> {{$commande->montant}}<br>
            <strong>Status : </strong> {{$commande->status}}<br>
        </p>
        <a href="{{route('commandes.index')}}" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
            Retourner à la liste des Commandes
        </a>
    </div>
</div>
@endsection