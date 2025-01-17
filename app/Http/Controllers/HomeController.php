<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $produits = Produit::orderBy('id', 'desc')->get();
        return view('home.index', compact('produits'));
    }

}
