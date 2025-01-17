<!-- filepath: /c:/Users/oussa/OneDrive/Desktop/Laravel/tp1_202_data2/resources/views/components/header.blade.php -->
<header class="bg-indigo-600 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold"><a href="/">Usama</a></h1>
        <nav>
            <a href="{{ route('catalogues.index') }}" class="text-white hover:underline mx-2">Catalogues</a>
            <a href="{{ route('clients.index') }}" class="text-white hover:underline mx-2">Clients</a>
            <a href="{{ route('categories.index') }}" class="text-white hover:underline mx-2">Categories</a>
            <a href="{{ route('produits.index') }}" class="text-white hover:underline mx-2">Produits</a>
            <a href="{{ route('commandes.index') }}" class="text-white hover:underline mx-2">Commandes</a>
            
            <a href="{{ route('panier.show')}}" class="text-white hover:underline mx-2"><img class="inline" src="{{asset('add-to-cart.png')}}" alt="Add To Card"></a>
        </nav>
    </div>
</header>