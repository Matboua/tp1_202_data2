<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categorieId = $request->input('categorie');
        $categories = Categorie::all();

        if ($categorieId) {
            $produits = Produit::where('categorie_id', $categorieId)->get();
        } else {
            $produits = Produit::orderBy('id', 'desc')->get();
        }

        return view('produits.index', compact('produits', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Categorie::all();
        return view('produits.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'prix' => 'required|numeric',
        'quantite' => 'required|integer',
        'categorie_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('produits/images', 'public');
        $validatedData['image'] = $imagePath;
    } else {
        $validatedData['image'] = 'default.jpg'; // Set the default image
    }

    Produit::create($validatedData);

    return redirect()->route('produits.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $produit = Produit::find($id);
        return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $produit = Produit::find($id);
        $categories = Categorie::all();
        return view('produits.edit', compact('produit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $produit = Produit::find($id);

    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'prix' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('produits/images', 'public');
        $validatedData['image'] = $imagePath;
    }

    $produit->update($validatedData);

    return redirect()->route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $produit = Produit::find($id);
    if ($produit) {
        $produit->delete();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false], 404);
    }
}
}
