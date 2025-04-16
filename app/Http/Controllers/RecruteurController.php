<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Specialite;
use App\Models\Recruteur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class RecruteurController 
{
    public function index(Request $request)
    {
        $aujourdhui = Carbon::today();
    
        // Récupérer le recruteur connecté
        $recruteur = Recruteur::where('user_id', auth()->user()->id)->first();
    
        $categories = Categorie::all();
        $specialites = Specialite::all();
    
        $offres_actives = collect();
        $offres_expirees = collect();
        $logo = null;
    
        if ($recruteur) {
            $logo = $recruteur->logo;
    
            // Requête de base pour les offres actives
            $offresQuery = Offre::where('recruteur_id', $recruteur->user_id)
                ->whereDate('date_expiration', '>=', $aujourdhui);
    
                if ($request->filled('titre')) {
                    $offresQuery->where('description', 'LIKE', '%' . $request->titre . '%');
                }

                if ($request->filled('type_contrat')) {
                    $offresQuery->where('type_contrat', $request->type_contrat);
                }

            // Filtrer par spécialité si sélectionnée
            if ($request->filled('specialite')) {
                $offresQuery->whereHas('specialites', function ($query) use ($request) {
                    $query->where('id', $request->specialite);
                });
            }
    
            // Filtrer par catégorie si sélectionnée
            if ($request->filled('categorie')) {
                $offresQuery->whereHas('specialites', function ($query) use ($request) {
                    $query->where('categorie_id', $request->categorie);
                });
            }
            
    
            $offres_actives = $offresQuery->get();
    
            // Offres expirées (non filtrées ici, mais tu peux aussi ajouter un filtre si tu veux)
            $offres_expirees = Offre::where('recruteur_id', $recruteur->user_id)
                ->whereDate('date_expiration', '<', $aujourdhui)
                ->get();
        }
    
        return view('Rec.recruteur', [
            'offres_actives' => $offres_actives,
            'offres_expirees' => $offres_expirees,
            'logo' => $logo,
            'categories' => $categories,
            'specialites' => $specialites
        ]);
    }
    
    public function toutesLesOffres(Request $request)
{
    $aujourdhui = Carbon::today();

    $categories = Categorie::all();
    $specialites = Specialite::all();

    $offres_actives = Offre::with('recruteur') 
        ->whereDate('date_expiration', '>=', $aujourdhui);

    if ($request->filled('titre')) {
        $offres_actives->where('description', 'LIKE', '%' . $request->titre . '%');
    }

    if ($request->filled('type_contrat')) {
        $offres_actives->where('type_contrat', $request->type_contrat);
    }

    if ($request->filled('specialite')) {
        $offres_actives->whereHas('specialites', function ($query) use ($request) {
            $query->where('id', $request->specialite);
        });
    }
 
     //  Recherche par catégorie via les spécialités liées
     if ($request->filled('categorie')) {
        $offres_actives->whereHas('specialites', function ($query) use ($request) {
            $query->where('categorie_id', $request->categorie);
        });
    } 
    $offres_actives = $offres_actives->get();

    return view('Rec.toutes_offres', [
        'offres_actives' => $offres_actives,
        'categories' => $categories,
        'specialites' => $specialites
    ]);
}




public function create()
{
    $specialites = Specialite::all();
    return view('offres.create', compact('specialites'));
}
public function store(Request $request)
{
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'type_contrat' => 'required|string',
        'date_expiration' => 'nullable|date',
        'specialites' => 'required|array',
    ]);

    $offre = Offre::create([
        'titre' => $validated['titre'],
        'description' => $validated['description'],
        'type_contrat' => $validated['type_contrat'],
        'date_expiration' => $validated['date_expiration'],
        'recruteur_id' => auth()->id(), // Assure-toi que le recruteur est connecté
    ]);

    $offre->specialites()->attach($validated['specialites']);

    return redirect()->route('offres.index')->with('success', 'Offre créée avec succès.');
}

public function showCandidatures($offreId)
{
    // Récupérer l'offre avec ses candidats (et leurs candidatures) où le statut est "En attente"
    $offre = Offre::with(['candidats' => function($query) {
        $query->wherePivot('etat', 'En attente');
    }])->findOrFail($offreId);

    return view('recruteur.candidatures', compact('offre'));
}

public function accepterCandidature($offreId, $candidatId)
{
    $offre = Offre::findOrFail($offreId);
    $offre->candidats()->updateExistingPivot($candidatId, ['etat' => 'Acceptée']);

    return redirect()->route('recruteur.candidatures', $offreId)
                     ->with('success', 'Candidature acceptée.');
}
public function refuserCandidature($offreId, $candidatId)
{
    $offre = Offre::findOrFail($offreId);
    $offre->candidats()->updateExistingPivot($candidatId, ['etat' => 'Refusée']);

    return redirect()->route('recruteur.candidatures', $offreId)
                     ->with('success', 'Candidature refusée.');
}
public function show($id)
{
    $offre = Offre::findOrFail($id);
    $recruteur = Recruteur::where('user_id', auth()->user()->id)->first();

    if ($recruteur) {
      
        $logo = $recruteur->logo;
    }
    return view('Rec.offre_detail_rec', [
        'offre' =>  $offre,
        'logo' => $logo
    ]);
   
}

public function showRecToutesOffres($id)
{
    $offre = Offre::findOrFail($id);
    $recruteur = Recruteur::where('user_id', auth()->user()->id)->first();

    if ($recruteur) {
      
        $logo = $recruteur->logo;
    }
    return view('Rec.offre_detail_toutes_offres', [
        'offre' =>  $offre,
        'logo' => $logo
    ]);
   
}

public function showProfil()
{
    $user = auth()->user();

    // On suppose que tu as une relation entre User et Recruteur
    $recruteur = $user->recruteur;

    return view('Rec.profil', compact('user', 'recruteur'));
}
public function updatePhoto(Request $request)
{
    $request->validate([
        'photo_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = auth()->user();

    // Supprimer l'ancienne photo si elle existe
    if ($user->photo_profil && Storage::disk('public')->exists($user->photo_profil)) {
        Storage::disk('public')->delete($user->photo_profil);
    }

    $path = $request->file('photo_profil')->store('photos_profil', 'public');
    $user->photo_profil = $path;
    $user->save();

    return redirect()->back()->with('success', 'Photo de profil mise à jour !');
}
public function update(Request $request)
{
    $user = auth()->user();
    
    // Validation des données
    $validated = $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'contact_phone' => 'nullable|string|max:20',
        'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
        'entreprise' => 'nullable|string|max:255',
        'descriptionEntreprise' => 'nullable|string|max:500',
        'poste' => 'nullable|string|max:255',
        'Localisation' => 'nullable|string|max:255',
        'website' => 'nullable|url|max:255',
    ]);

    // Mise à jour des informations générales si elles sont présentes
    if ($request->has('name')) {
        $user->name = $validated['name'];
    }

    if ($request->has('email')) {
        $user->email = $validated['email'];
    }

    if ($request->has('contact_phone')) {
        $user->contact_phone = $validated['contact_phone'];
    }

    // Mise à jour du mot de passe si nécessaire
   

    // Mise à jour de la photo de profil
    if ($request->hasFile('photo_profil')) {
        $photo = $request->file('photo_profil')->store('photos_profil', 'public');
        $user->photo_profil = $photo;
    }

    // Mise à jour des informations spécifiques au recruteur
    $recruteur = $user->recruteur;

    if ($request->has('entreprise')) {
        $recruteur->entreprise = $validated['entreprise'];
    }

    if ($request->has('descriptionEntreprise')) {
        $recruteur->descriptionEntreprise = $validated['descriptionEntreprise'];
    }

    if ($request->has('poste')) {
        $recruteur->poste = $validated['poste'];
    }

    if ($request->has('Localisation')) {
        $recruteur->Localisation = $validated['Localisation'];
    }

    if ($request->has('website')) {
        $recruteur->website = $validated['website'];
    }

    // Mise à jour du logo de l'entreprise si nécessaire
    if ($request->hasFile('logo')) {
        $logo = $request->file('logo')->store('logos', 'public');
        $recruteur->logo = $logo;
    }

    // Sauvegarde des données
    $user->save();
    $recruteur->save();

    // Retourner vers la page du profil avec un message de succès
    return redirect()->route('recruteur.profil')->with('success', 'Profil mis à jour avec succès');
}

public function edit()
{
    $user = auth()->user();
    $recruteur = $user->recruteur; // Récupérer les informations du recruteur

    return view('Rec.edit', compact('user', 'recruteur'));
}
public function editPassword()
{
    return view('Rec.edit_password');
}

public function updatePassword(Request $request)
{
   

    $request->validate([
        'oldPassword' => 'required',
        'newPassword' => 'required|min:6|same:confirmPassword',
        'confirmPassword' => 'required',
    ], [
        'newPassword.min' => 'Le nouveau mot de passe doit contenir au moins 6 caractères.',
        'newPassword.same' => 'La confirmation du mot de passe ne correspond pas.',
        'oldPassword.required' => 'Veuillez saisir votre mot de passe actuel.',
    ]);

    $user = auth()->user();

    // Vérifier que l'ancien mot de passe est correct
    if (!\Hash::check($request->oldPassword, $user->password)) {
        return back()->withErrors(['oldPassword' => 'Le mot de passe actuel est incorrect.'])->withInput();
    }
    $user->password = bcrypt($request->newPassword);
    $user->save();

    return redirect()->back()->with('password_updated', true);
}


}
