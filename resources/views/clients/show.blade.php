<!-- filepath: /C:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/clients/show.blade.php -->
@extends('layouts.app')

@section('title', 'Détails du client')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Détails du client N° {{$client->id}}</h1>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-gray-700 mb-4">
            <strong>Prenom : </strong> {{$client->prenom}}<br>
            <strong>Nom : </strong> {{$client->nom}}<br>
            <strong>Telephone : </strong> {{$client->telephone}}<br>
            <strong>Ville : </strong> {{$client->ville}}<br>
            <strong>Date Naissance : </strong> {{$client->date_naissance}}
        </p>
        <a href="{{ route('clients.index') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
            Retour à la liste des Clients
        </a>
    </div>
</div>
@endsection