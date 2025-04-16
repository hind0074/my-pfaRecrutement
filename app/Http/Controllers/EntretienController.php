<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entretien;
use App\Models\Recruteur;

class EntretienController 
{

    public function store(Request $request)
{
    $request->validate([
        'offre_id' => 'required|exists:offres,id',
        'candidat_id' => 'required|exists:candidats,user_id',
        'date_heure' => 'required|date',
        'message' => 'required|string',
    ]);

    $recruteur = Recruteur::where('user_id', auth()->id())->firstOrFail();

    Entretien::create([
        'recruteur_id' => $recruteur->user_id,
        'candidat_id' => $request->candidat_id,
        'date_heure' => $request->date_heure,
        'message' => $request->message,
        'etat' => 'Planifié', // Par défaut, ou adapte selon ton besoin
    ]);

    return redirect()->route('candidatures.index')->with('success', 'Entretien programmé avec succès.');
}

}
