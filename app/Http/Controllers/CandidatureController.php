<?php
namespace App\Http\Controllers;

use App\Models\candidature;
use App\Models\Recruteur;
use App\Models\Offre;
use App\Models\Candidat;
use Illuminate\Http\Request;


class CandidatureController
{
    public function updateEtat($offreId, $candidatId, Request $request)
    {
        $recruteur = Recruteur::where('user_id', auth()->id())->first();
    
        if (!$recruteur) {
            abort(403, 'Accès refusé.');
        }
    
        // Vérifier si l'offre existe et appartient au recruteur
        $offre = Offre::where('recruteur_id', $recruteur->user_id)->findOrFail($offreId);
    
        // Vérifier si le candidat a postulé à cette offre
        $candidat = Candidat::findOrFail($candidatId);
    
        // Trouver la candidature
        $candidature = $offre->candidats()->wherePivot('candidat_id', $candidatId)->first();
    
        if (!$candidature) {
            abort(404, 'Candidature non trouvée.');
        }
    
        // Mettre à jour l'état de la candidature
        $candidature->pivot->etat = $request->etat;
        $candidature->pivot->save();
    
        return redirect()->route('candidatures.index')->with('success', 'État de la candidature mis à jour.');
    }
    
}

