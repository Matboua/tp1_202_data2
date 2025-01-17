<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function add(Request $request, $id){
        $panier = $request->session()->get('panier', []);
        if(isset($panier[$id])){
            $panier[$id]+=1;
        }else{
            $panier[$id]=1;
        }
        $request->session()->put('panier', $panier);
        return redirect()->back();
    }
    public function increment(Request $request, $id){
        $panier = $request->session()->get('panier', []);
        if(isset($panier[$id])){
            $panier[$id]+=1;
        }else{
            $panier[$id]=1;
        }
        $produits = Produit::findMany(array_keys($panier));
        $request->session()->put('panier', $panier);
        $total = $this->calculTotal($panier);
        return view('panier.show', compact('total', 'panier', 'produits'));
    }

    public function show(Request $request){
        $panier = $request->session()->get('panier',[]);
        $produits = Produit::findMany(array_keys($panier));
        $total = $this->calculTotal($panier);
        return view('panier.show', compact('panier', 'produits', 'total'));
    }

    public function decrement(Request $request, $id){
        $panier = $request->session()->get('panier',[]);
        if(isset($panier[$id]) && $panier[$id]>1){
            $panier[$id] -= 1;
            $request->session()->put('panier', $panier);
        }
        $total = $this->calculTotal($panier);
        $produits = Produit::findMany(array_keys($panier));
        return view('panier.show', compact('produits', 'total'));
    }

    private function calculTotal($panier){
        $produits = Produit::findMany(array_keys($panier));
        $total = 0;
        foreach($produits as $item){
            $total += $item->prix * $panier[$item->id];
        }
        return $total;
    }
}
