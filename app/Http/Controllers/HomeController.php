<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $produits = Produit::all(['id','nom','prix','image']);
        return view('home.index', compact('produits'));
    }

}
