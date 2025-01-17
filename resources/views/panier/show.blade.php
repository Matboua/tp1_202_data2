@extends('layouts.app')
@section('content')
<div class="bg-gray-100 h-screen py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="md:w-3/4">
                <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold">Product</th>
                                <th class="text-left font-semibold">Price</th>
                                <th class="text-left font-semibold">
                                    Quantity
                                </th>
                                <th class="text-left font-semibold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $item)
                                <tr>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img
                                            class="h-16 w-16 mr-4"
                                            src="{{url($item->image)}}"
                                            alt="{{$item->nom}} image"
                                        />
                                        <span class="font-semibold"
                                            >{{$item->nom}}</span
                                        >
                                    </div>
                                </td>
                                <td class="py-4">{{$item->prix}}</td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <form action="{{route('panier.decrement', $item->id)}}" method="POST">
                                            @csrf
                                            <button
                                            class="border rounded-md py-2 px-4 mr-2"
                                            onclick="decrement()"
                                            @if ($panier[$item->id]== 1)
                                            disabled 
                                            @endif
                                        >
                                            -
                                        </button>
                                        </form>
                                        <span class="text-center w-8" >{{$panier[$item->id]}}</span>
                                        <form action="{{route('panier.increment', $item->id)}}" method="POST">
                                            @csrf
                                            <button
                                            class="border rounded-md py-2 px-4 ml-2"
                                        >
                                            +
                                        </button>
                                        </form>
                                    </div>
                                </td>
                                <td class="py-4">{{$item->prix * $panier[$item->id]}}</td>
                            </tr>
                            @endforeach
                            <!-- More product rows -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>{{$total}}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Taxes</span>
                        <span>{{$total * 0.2}}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>$0.00</span>
                    </div>
                    <hr class="my-2" />
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Total</span>
                        <span class="font-semibold">{{$total * 1.2}}</span>
                    </div>
                    <button
                        class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full"
                    >
                        Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection