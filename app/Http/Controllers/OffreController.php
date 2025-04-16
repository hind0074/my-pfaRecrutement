<?php
namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Candidat;
use App\Models\Specialite;  // Assure-toi que tu as bien ce modèle
use App\Models\Categorie; 
use App\Models\Recruteur; 
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OffreController
{
    // Affiche le formulaire pour postuler avec un CV
    public function showPostulerForm($offreId)
    {
        $offre = Offre::find($offreId);
        
        if (!$offre) {
            return redirect()->route('offre.toutes_offres_detail_candidat',$offre->id)->with('error', 'Offre non trouvée');
        }

        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('principal')->with('error', 'Vous devez être connecté pour postuler');
        }

        $candidat = Auth::user()->candidat;

        if (!$candidat) {
            return redirect()->route('offre.toutes_offres_detail_candidat',$offre->id)->with('error', 'Vous devez compléter votre profil candidat pour postuler');
        }

        return view('Can.postuler', ['offre' => $offre]);
    }

    // Méthode pour valider la postulation avec CV
    public function postuler($offreId, Request $request)
    {
        $offre = Offre::find($offreId);

        if (!$offre) {
            return redirect()->route('offre.toutes_offres_detail_candidat',$offre->id)->with('error', 'Offre non trouvée');
        }

        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('principal')->with('error', 'Vous devez être connecté pour postuler');
        }

        $candidat = Auth::user()->candidat;

        if (!$candidat) {
            return redirect()->route('offre.toutes_offres_detail_candidat',$offre->id)->with('error', 'Vous devez compléter votre profil candidat pour postuler');
        }

        // Vérifier si le candidat a déjà postulé à cette offre
        $alreadyApplied = $candidat->offres()->where('offre_id', $offreId)->exists();

        if ($alreadyApplied) {
            return redirect()->route('offre.toutes_offres_detail_candidat', $offre->id)->with('error', 'Vous avez déjà postulé à cette offre.');
        }


        
        // Télécharger le CV si fourni
        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv', 'public');
        }

        // Enregistrer la postulation dans la table pivot
        $candidat->offres()->attach($offre->id, [
            'cv' => $cvPath,
            'date_postulation' => now(),
            'etat' => 'En attente',
            'created_at' => now(),  
            'updated_at' => now(), 
        ]);

        return redirect()->route('offre.toutes_offres_detail_candidat',  $offreId)->with('success', 'Vous avez postulé à cette offre.');
    }

    

    public function expirées()
    {
        // Récupérer les offres expirées
        $offresExpirées = Offre::where('date_expiration', '<', Carbon::now())->get();

        // Retourner une vue avec les offres expirées
        return view('offres.expirées', compact('offresExpirées'));
    }

    public function create()
    {
        // Récupérer toutes les spécialités avec leur catégorie associée
        $categories = Categorie::all();

        // Retourner la vue avec les spécialités
        return view('offres.create', compact('categories'));
    }
   
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'type_contrat' => 'required|string',
            'location' => 'required|string',
            'date_expiration' => 'nullable|date',
            'specialites' => 'required|array',  // Les spécialités doivent être sélectionnées
            'specialites.*' => 'exists:specialites,id',  // Assure-toi que les spécialités existent
        ]);

        // Création de l'offre
        $offre = Offre::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'type_contrat' => $request->type_contrat,
            'location' => $request->location,
            'date_expiration' => $request->date_expiration,
            'recruteur_id' => auth()->user()->id,  // Associer l'ID de l'utilisateur connecté
        ]);

        // Associer les spécialités sélectionnées à l'offre
        $offre->specialites()->sync($request->specialites);  // Utilise sync pour enregistrer les spécialités

        return redirect()->route('recruteur.index')->with('success', 'Offre créée avec succès');
    }
    
    public function getSpecialites($categorieId)
{
    // Vérifie si la catégorie existe
    $categorie = Categorie::find($categorieId);
    if (!$categorie) {
        return response()->json(['error' => 'Catégorie non trouvée'], 404);
    }

    // Récupérer les spécialités liées à la catégorie
    $specialites = Specialite::where('categorie_id', $categorieId)->get();

    // Vérifier si des spécialités sont trouvées
    if ($specialites->isEmpty()) {
        return response()->json(['specialites' => []]);
    }

    // Retourner les spécialités sous forme JSON
    return response()->json(['specialites' => $specialites]);
}



    public function showExpiredOffers()
    {
        $recruteur = Recruteur::where('user_id', auth()->user()->id)->first();
    
        // Offres expirées liées à ce recruteur uniquement
        $offres = Offre::where('recruteur_id', $recruteur->user_id)
            ->where('date_expiration', '<', Carbon::now())
            ->get();
    
        return view('offres.expirees', compact('offres'));
    }
    
    public function edit($id)
    {
        // Récupérer l'offre à modifier
        $offre = Offre::findOrFail($id);
    
        // Récupérer la catégorie liée à l'offre via les spécialités associées
        $categorieId = $offre->specialites->first()->categorie_id ?? null;
    
        // Récupérer toutes les catégories
        $categories = Categorie::all();
    
        // Récupérer les spécialités liées à la catégorie de l'offre
        $specialites = Specialite::where('categorie_id', $categorieId)->get();
    
        return view('offres.edit', compact('offre', 'categories', 'specialites', 'categorieId'));
    }
  
    
    
public function update(Request $request, $id)
{
    $offre = Offre::findOrFail($id);

    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required',
        'type_contrat' => 'required|string',
        'date_expiration' => 'nullable|date',
        'location' => 'required|string|max:255'
    ]);

    $offre->update($request->only(['titre', 'description', 'type_contrat', 'date_expiration','location']));

    $offre->specialites()->sync($request->input('specialites', []));

    return redirect()->route('offre.detail_rec',$offre->id)->with('success', 'Offre modifiée avec succès.');
}
public function destroy($id)
{
    $offre = Offre::findOrFail($id);

    // Supprimer l'offre
    $offre->delete();

    return redirect()->route('recruteur.index')->with('success', 'Offre supprimée avec succès.');
}

public function showRecruteurCandidatures()
{
    $recruteur = Recruteur::where('user_id', auth()->id())->first();

    if (!$recruteur) {
        abort(403, 'Accès refusé.');
    }

    $aujourdhui = Carbon::today();

    // Récupérer uniquement les offres non expirées du recruteur avec les candidats
    $offres = $recruteur->offres()
        ->whereDate('date_expiration', '>=', $aujourdhui)
        ->with('candidats')
        ->get();

    return view('candidatures.index', compact('offres'));
}


public function showCandidatCandidatures()
{
    // Récupérer le candidat connecté via l'utilisateur
    $candidat = Candidat::where('user_id', auth()->id())->first();

    if (!$candidat) {
        abort(403, 'Accès refusé.');
    }

    // Récupérer les candidatures du candidat, avec les infos des offres associées via la relation 'offres'
    // On charge aussi la table pivot (avec 'date_postulation', 'etat', etc.) si nécessaire
    $offres = $candidat->offres()
        ->withPivot('date_postulation', 'etat', 'cv') // Si tu veux inclure les données de la table pivot
        ->get();

    return view('candidatures.Candidat_candidature', compact('offres'));
}


}
