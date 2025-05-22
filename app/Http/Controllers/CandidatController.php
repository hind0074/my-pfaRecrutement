<?php

namespace App\Http\Controllers;
use App\Models\Offre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Ecole;
use App\Models\Specialite;
use App\Models\Entretien;
use App\Models\Candidature;
use App\Models\Candidat;
use App\Models\Recruteur;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class CandidatController
{
   
   
    public function index(Request $request)
    {
        $aujourdhui = Carbon::today();
    
        // Récupérer les catégories et spécialités
        $categories = Categorie::all();
        $specialites = Specialite::all();
    
        // Définir la requête des offres actives
        $offres_actives = Offre::with('recruteur') // Charger le recruteur pour accéder au logo
        ->where('statut', 'approuvé') // <-- Ajouter la condition pour le statut
        ->whereDate('date_expiration', '>=', $aujourdhui);
    
        // Filtrer selon les critères fournis
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
    
        if ($request->filled('categorie')) {
            $offres_actives->whereHas('specialites', function ($query) use ($request) {
                $query->where('categorie_id', $request->categorie);
            });
        }
    
        // Si la requête inclut un paramètre 'voir_toutes', on ne limite pas le nombre d'offres
        if ($request->filled('voir_toutes')) {
            // Pas de limite, récupère toutes les offres
            $offres_actives = $offres_actives->get();
        } else {
            // Limiter à un certain nombre d'offres (par exemple 5)
            $offres_actives = $offres_actives->limit(3)->get();
        }
        $user = auth()->user();

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
    
        return view('Can.candidat', [
            'offres_actives' => $offres_actives,
            'categories' => $categories,
            'specialites' => $specialites,
            'entretiens' => $entretiens,
            'candidaturesRefusees' => $candidaturesRefusees,
        ]);
    }
    


    public function show($id)
    {
        $offre = Offre::findOrFail($id);
        return view('Can.offre_detail', compact('offre'));
    }

    public function allOffres()
{
    $offres = Offre::with('recruteur')->latest()->paginate(10);
    return view('Can.candidat_offres', compact('offres'));
}

public function showCanToutesOffres($id)
{
    $offre = Offre::findOrFail($id);
    $candidat = Candidat::where('user_id', auth()->user()->id)->first();
    
    $user = User::find(auth()->id());
    $entretiens = Entretien::where('candidat_id', $user->id)
        ->where('etat', 'Planifié')
        ->where('date_heure', '>=', now())
        ->with('offre') 
        ->get();

    $candidaturesRefusees = Candidature::where('candidat_id', $user->id)
        ->where('etat', 'Refusé')
        ->with('offre') 
        ->get();

    if ($candidat) {
      
        $logo = $candidat->logo;
    }
    return view('Can.offre_detail_toutes_offres_candidat', [
        'offre' =>  $offre,
        'logo' => $logo,
        'entretiens' => $entretiens,
        'candidaturesRefusees' => $candidaturesRefusees
    ]);
}

public function showProfil()
{
    $user = auth()->user();

    $candidat = Candidat::with('ecoles')->where('user_id', $user->id)->first();

    $entretiens = Entretien::where('candidat_id', $user->id)
        ->where('etat', 'Planifié')
        ->where('date_heure', '>=', now())
        ->with('offre') 
        ->get();

    $candidaturesRefusees = Candidature::where('candidat_id', $user->id)
        ->where('etat', 'Refusé')
        ->with('offre') 
        ->get();

    return view('Can.profil', compact('user', 'candidat','entretiens','candidaturesRefusees'));
}

public function edit($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::find($id);

    // Récupérer toutes les écoles pour l'affichage dans le formulaire
    $ecoles = Ecole::all();

    // Récupérer les écoles et les diplômes associés au candidat
    $ecolesActuelles = $user->candidat->ecoles()->withPivot('diplome')->get();
   
    $entretiens = Entretien::where('candidat_id', $user->id)
    ->where('etat', 'Planifié')
    ->where('date_heure', '>=', now())
    ->with('offre') 
    ->get();

$candidaturesRefusees = Candidature::where('candidat_id', $user->id)
    ->where('etat', 'Refusé')
    ->with('offre') 
    ->get();

    // Retourner la vue avec ces informations
    return view('Can.edit', compact('user', 'ecoles', 'ecolesActuelles','entretiens','candidaturesRefusees'));
}

public function editPassword()
{
    return view('Rec.edit_password');
}
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validation
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'contact_phone' => 'required|string|max:255',
        'adresse' => 'nullable|string|max:255',
        'experience' => 'nullable|string|max:5000',
        'competences' => 'nullable|string|max:5000',
        'langues' => 'nullable|string|max:255',
        'linkedin' => 'nullable|url|max:255',
        'ecoles' => 'array',
        'ecoles.*' => 'exists:ecoles,id',
        'diplomes' => 'array',
        'diplomes.*' => 'string|max:255',
        'dates_debut' => 'array',
        'dates_debut.*' => 'date',
        'dates_fin' => 'array',
        'dates_fin.*' => 'date|after_or_equal:dates_debut.*',
        'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Mise à jour des infos de base
    $user->update($request->only([
        'name', 
        'email', 
        'contact_phone',
    ]));

    // Traitement de la photo de profil uniquement si une nouvelle est uploadée
    if ($request->hasFile('photo_profil')) {
        $photo_profil = $request->file('photo_profil');

        // Supprimer l'ancienne s'il y en a une
        if ($user->photo_profil && Storage::disk('public')->exists($user->photo_profil)) {
            Storage::disk('public')->delete($user->photo_profil);
        }

        // Enregistrer la nouvelle image
        $path = $photo_profil->store('photos_profil', 'public');
        $user->photo_profil = $path;
        $user->save(); // Sauvegarde uniquement si une nouvelle photo est enregistrée
    }

    // Mise à jour du profil candidat
    $user->candidat->update($request->only([
        'adresse', 
        'experience', 
        'competences', 
        'langues', 
        'linkedin'
    ]));

    // Mise à jour des écoles (pivot avec sync)
    if ($request->has('ecoles')) {
        $ecoles = $request->input('ecoles');
        $diplomes = $request->input('diplomes');
        $datesDebut = $request->input('dates_debut');
        $datesFin = $request->input('dates_fin');

        $pivotData = [];

        foreach ($ecoles as $key => $ecoleId) {
            $pivotData[$ecoleId] = [
                'diplome' => $diplomes[$key],
                'date_debut' => $datesDebut[$key],
                'date_fin' => $datesFin[$key],
            ];
        }

        $user->candidat->ecoles()->sync($pivotData);
    }

    return redirect()->route('candidat.profil', $user->id)->with('success', 'Profil mis à jour avec succès');
}


public function updatePassword(Request $request)
{
    // Validation des champs
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

    // Vérifie l'ancien mot de passe
    if (!\Hash::check($request->oldPassword, $user->password)) {
        return back()->withErrors(['oldPassword' => 'Le mot de passe actuel est incorrect.'])->withInput();
    }

    // Met à jour le mot de passe
    $user->password = bcrypt($request->newPassword);
    $user->save();

    return redirect()->back()->with('password_updated', true);
}



}
