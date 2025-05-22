<?php
namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Offre;
use Illuminate\Http\Request;
use App\Models\Entretien;
use App\Models\Recruteur;
use App\Models\User;
use App\Mail\EntretienPlanifie;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class EntretienController 
{

   

public function store(Request $request)
{
    $request->validate([
        'offre_id' => 'required|exists:offres,id',
        'candidat_id' => 'required|exists:users,id',
        'date_heure' => 'required|date',
        'message' => 'required|string',
    ]);

    $recruteur = Recruteur::where('user_id', auth()->id())->firstOrFail();

    $entretien = Entretien::create([
        'recruteur_id' => $recruteur->user_id,
        'candidat_id' => $request->candidat_id,
        'date_heure' => $request->date_heure,
        'message' => $request->message,
        'etat' => 'Planifié', // Par défaut, ou adapte selon ton besoin
        'offre_id' => $request->offre_id, 
    ]);

    // Récupère les infos du candidat
    $candidat = User::find($request->candidat_id);
     
    // Envoie de mail
    Mail::to($candidat->email)->send(new EntretienPlanifie($entretien));

    return redirect()->back()->with('success', 'Entretien planifié et mail envoyé au candidat.');
}

public function showNotifications()
{
    $user = auth()->user();

    // ✅ Entretien accepté (à venir)
    $entretiens = Entretien::where('candidat_id', $user->id)
        ->where('etat', 'Planifié')
        ->where('date_heure', '>=', now())
        ->with('offre') // Si relation définie (recommandé)
        ->get();

    // ❌ Candidatures refusées
    $candidaturesRefusees = Candidature::where('candidat_id', $user->id)
        ->where('etat', 'Refusé')
        ->with('offre') // Si relation définie
        ->get();

        return view('Can.notifications', [
            'entretiens' => $entretiens,
            'candidaturesRefusees' => $candidaturesRefusees,
        ]);
}
public function indexRecruteur()
{
    
    $recruteur = auth()->user(); // ou autre selon ton système

    $entretiens = Entretien::where('recruteur_id', $recruteur->id)
        ->where('date_heure', '>', now())
        ->orderBy('date_heure')
        ->get();

    return view('candidatures.index', compact('entretiens'));
}


}




