@extends('layouts.app')

@section('title', 'Catalogue du Produits')

@section('content')
    @php
        $counter = 0
    @endphp
    <div class="container justify-center flex flex-wrap gap-4 bg-gray-200	">
        @foreach($produits as $produit)
            <div class="flex flex-col w-1/6 gap-4 justify-between items-center border-solid border-2 border-gray-400 p-4 bg-white">
                @if ($counter%5==0)
                    <img src="{{asset('produit.png')}}" alt="Produit Image" width="120px">
                    @php
                        $counter++
                    @endphp
                @elseif ($counter%3==0)
                    <img src="{{asset('produit2.png')}}" alt="Produit Image" width="120px">
                    @php
                        $counter++
                    @endphp
                @elseif ($counter%2==0)
                    <img src="{{asset('produit4.png')}}" alt="Produit Image" width="120px">
                    @php
                        $counter++
                    @endphp
                @else
                    <img src="{{asset('produit3.png')}}" alt="Produit Image" width="120px">
                    @php
                        $counter++
                    @endphp
                @endif
                <h3>{{$produit->nom}}</h3>
                <div class="flex justify-between items-center w-full">
                    <div class="flex items-center">
                        <p class="text-blue-500 font-bold mr-1 text-2xl">{{ explode('.', $produit->prix)[0]}}</p>
                        <div class=" flex flex-col text-blue-500 font-bold text-xs"><span style="margin-bottom:-5px">{{ explode('.', $produit->prix)[1]}}</span><span>DH</span></div>
                    </div>
                    <a href="{{ route('card.add', $produit->id) }}">
                        <img class="cursor-pointer" src="{{asset('add-to-cart.png')}}" alt="Add To Card">
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection