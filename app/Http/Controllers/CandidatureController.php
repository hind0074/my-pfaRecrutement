<?php
namespace App\Http\Controllers;

use App\Models\candidature;
use App\Models\Recruteur;
use App\Models\Offre;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CandidatureController
{
    
    public function updateEtat($offreId, $candidatId, Request $request)
{
    $recruteur = Recruteur::where('user_id', auth()->id())->first();
    
    if (!$recruteur) {
        return response()->json(['success' => false, 'message' => 'Accès refusé.'], 403);
    }

    // Vérifier si l'offre existe et appartient au recruteur
    $offre = Offre::where('recruteur_id', $recruteur->user_id)->findOrFail($offreId);

    // Vérifier si le candidat a postulé à cette offre
    $candidat = Candidat::findOrFail($candidatId);

    // Trouver la candidature
    $candidature = $offre->candidats()->wherePivot('candidat_id', $candidatId)->first();

    if (!$candidature) {
        return response()->json(['success' => false, 'message' => 'Candidature non trouvée.'], 404);
    }

    // Mettre à jour l'état de la candidature
    $candidature->pivot->etat = $request->etat;
    $candidature->pivot->save();

    return response()->json(['success' => true, 'message' => 'Candidature mise à jour avec succès.']);
}
public function destroy($offreId, $candidatId)
{
    $candidature = DB::table('candidat_offre')
                     ->where('offre_id', $offreId)
                     ->where('candidat_id', $candidatId)
                     ->delete();

    if ($candidature) {
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false], 400);
    }
}
public function update(Request $request, $offreId, $candidatId)
{
    $request->validate([
        'cv' => 'required|file|mimes:pdf,doc,docx'
    ]);

    $candidature = DB::table('candidat_offre')
                     ->where('offre_id', $offreId)
                     ->where('candidat_id', $candidatId)
                     ->update([
                         'cv' => $request->file('cv')->store('cvs', 'public')
                     ]);

    if ($candidature) {
        return redirect()->back()->with('success', 'Candidature mise à jour avec succès');
    } else {
        return redirect()->back()->with('error', 'Une erreur est survenue');
    }
}


    

    
}

