<!-- filepath: /c:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <h1 class="text-4xl font-bold text-center mb-8 text-indigo-700">Welcome to Usama Store</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full">
            <h5 class="text-2xl font-bold mb-4 text-indigo-600">Catalogues</h5>
            <p class="text-gray-700 mb-6">Manage your catalogues.</p>
            <a href="{{ route('catalogues.index') }}" class="text-white bg-indigo-500 hover:bg-indigo-700 font-bold py-2 px-4 rounded">View Catalogues</a>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-lg w-full">
            <h5 class="text-2xl font-bold mb-4 text-indigo-600">Clients</h5>
            <p class="text-gray-700 mb-6">Manage your clients.</p>
            <a href="{{ route('clients.index') }}" class="text-white bg-indigo-500 hover:bg-indigo-700 font-bold py-2 px-4 rounded">View Clients</a>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-lg w-full">
            <h5 class="text-2xl font-bold mb-4 text-indigo-600">Categories</h5>
            <p class="text-gray-700 mb-6">Manage your categories.</p>
            <a href="{{ route('categories.index') }}" class="text-white bg-indigo-500 hover:bg-indigo-700 font-bold py-2 px-4 rounded">View Categories</a>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-lg w-full">
            <h5 class="text-2xl font-bold mb-4 text-indigo-600">Produits</h5>
            <p class="text-gray-700 mb-6">Manage your produits.</p>
            <a href="{{ route('produits.index') }}" class="text-white bg-indigo-500 hover:bg-indigo-700 font-bold py-2 px-4 rounded">View Produits</a>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-lg w-full">
            <h5 class="text-2xl font-bold mb-4 text-indigo-600">Commandes</h5>
            <p class="text-gray-700 mb-6">Manage your commandes.</p>
            <a href="{{ route('commandes.index') }}" class="text-white bg-indigo-500 hover:bg-indigo-700 font-bold py-2 px-4 rounded">View Commandes</a>
        </div>
    </div>
@endsection