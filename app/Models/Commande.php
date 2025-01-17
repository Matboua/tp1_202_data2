<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Commande extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'date', 'montant', 'status'];

    public function produits(){
        return $this->BelongsToMany(Produit::class)->withPivot('quantite');
    }

    public function totalePrix(){
        $total = 0;
        foreach($this->produits as $produit){
            $total += $produit->prix * $produit->pivot->quantite;
        }
        return $total;
    }

    static function ajouterCommand($produitsIds, $quantites, $client_id, $date){
        $commande = new Commande();
        $commande->client_id = $client_id;
        $commande->date = $date;
        $commande->montant = 0;
        $commande->save();
        for($i = 0; $i < count($produitsIds); $i++){
            $commande->produits()->attach($produitsIds[$i], ['quantite' => $quantites[$i]]);
        }
        $commande->montant = $commande->totalePrix();
        $commande->save();
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
