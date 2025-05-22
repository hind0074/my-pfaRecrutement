<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Candidature;
use App\Models\User;
use App\Models\Recruteur;
use App\Models\Categorie;
use App\Models\Specialite;
use App\Models\Candidat;
use Illuminate\Support\Facades\DB;
use App\Mail\CompteSupprime;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class AdminController
{
    public function index() {
        $totalOffres = Offre::count();
        $totalCandidatures = Candidature::count();
        $totalRecruteurs = Recruteur::count();
        $totalCandidats = Candidat::count();
        $pendingOffers = Offre::where('statut', 'en attente')
        ->where('date_expiration', '>=', now())
        ->get();
        // Crée une liste vide des semaines du mois
$weeks = collect(range(1, 4))->map(function($week) {
    return ['week_in_month' => $week, 'offer_count' => 0];
});

// Offres par semaine
$offersRaw = DB::table('offres')
    ->selectRaw('FLOOR((DAY(created_at) - 1) / 7) + 1 as week_in_month, COUNT(*) as offer_count')
    ->where('statut', 'approuvé')
    ->whereBetween('created_at', [
        now()->startOfMonth(),
        now()->endOfMonth()
    ])
    ->groupBy('week_in_month')
    ->get();

// Fusionner avec la liste des semaines (et remplacer les valeurs si la semaine existe)
$offersPerWeek = $weeks->map(function($week) use ($offersRaw) {
    $match = $offersRaw->firstWhere('week_in_month', $week['week_in_month']);
    if ($match) {
        $week['offer_count'] = $match->offer_count;
    }
    return $week;
});

// Même principe pour les candidatures
$applicationsRaw = DB::table('candidat_offre')
    ->selectRaw('FLOOR((DAY(created_at) - 1) / 7) + 1 as week_in_month, COUNT(*) as application_count')
    ->whereBetween('created_at', [
        now()->startOfMonth(),
        now()->endOfMonth()
    ])
    ->groupBy('week_in_month')
    ->get();

$applicationsPerWeek = $weeks->map(function($week) use ($applicationsRaw) {
    $match = $applicationsRaw->firstWhere('week_in_month', $week['week_in_month']);
    return [
        'week_in_month' => $week['week_in_month'],
        'application_count' => $match ? $match->application_count : 0
    ];
});


    
        return view('Adm.admin', [
            'totalOffres' => $totalOffres,
            'totalCandidatures' => $totalCandidatures,
            'totalRecruteurs' => $totalRecruteurs,
            'totalCandidats' => $totalCandidats,
            'pendingOffers' => $pendingOffers,
            'offersPerWeek' => $offersPerWeek,
            'applicationsPerWeek' => $applicationsPerWeek
        ]);
    }
    public function approve($id)
{
    $offre = Offre::findOrFail($id);
    $offre->statut = 'approuvé';
    $offre->save();

    return redirect()->route('Adm.offres')->with('success', 'L\'offre a été approuvée avec succès !');
}
public function refuse($id)
{
    $offre = Offre::findOrFail($id);
    $offre->statut = 'refusé';
    $offre->save();

    return redirect()->route('Adm.offres')->with('success', 'L\'offre a été refusée avec succès.');
}
public function utilisateurs(Request $request)
{
    $voirToutCandidats = $request->query('voir_tout_candidats');
    $voirToutRecruteurs = $request->query('voir_tout_recruteurs');

    $candidats = Candidat::with('user')
        ->when(!$voirToutCandidats, fn($query) => $query->take(4))
        ->get();

    $recruteurs = Recruteur::with('user')
        ->when(!$voirToutRecruteurs, fn($query) => $query->take(4))
        ->get();
    
        $admins = User::where('type', 'admin')->take(4)->get();

        if ($request->has('voir_tout_admins')) {
            $voirToutAdmins = true;
            $admins = User::where('type', 'admin')->get();  // On récupère tous les admins
        } else {
            $voirToutAdmins = false;  // Sinon, on garde seulement les 2 premiers admins
        }

    return view('Adm.utilisateurs', compact('candidats', 'recruteurs', 'voirToutCandidats', 'voirToutRecruteurs','admins','voirToutAdmins'));
}
public function storeCategory(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000'
    ]);

    Categorie::create($request->only(['nom', 'description']));

    return redirect()->back()->with('success', 'Catégorie ajoutée avec succès !');
}

public function storeSpecialite(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'categorie_id' => 'required|exists:categories,id'
    ]);

    Specialite::create($request->only(['nom', 'description', 'categorie_id']));

    return redirect()->back()->with('success', 'Spécialité ajoutée avec succès !');
}

public function showCategories()
{
    $categories = Categorie::with('specialites')->get();
    return view('Adm.categories', compact('categories'));
}

public function updateCategory(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
    ]);

    $categorie = Categorie::findOrFail($id);
    $categorie->update($request->only(['nom', 'description']));

    return redirect()->back()->with('success', 'Catégorie modifiée avec succès !');
}
public function deleteCategory($id)
{
    $categorie = Categorie::findOrFail($id);
    $categorie->delete();

    return redirect()->back()->with('success', 'Catégorie supprimée.');
}
public function updateSpecialite(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
    ]);

    $specialite = Specialite::findOrFail($id);
    $specialite->update($request->only(['nom', 'description']));

    return redirect()->back()->with('success', 'Spécialité modifiée avec succès.');
}
// AdminController.php
public function deleteSpecialite($id)
{
    // Trouver la spécialité par son ID
    $specialite = Specialite::findOrFail($id);

    // Supprimer la spécialité
    $specialite->delete();

    // Rediriger après la suppression
    return redirect()->back()->with('success', 'Spécialité supprimée avec succès.');
}


public function showAdmToutesOffres($id)
{
    $offre = Offre::findOrFail($id);
   
   
    return view('Adm.detail_offre', [
        'offre' =>  $offre,
      
    ]);
}


public function offres() {

    $pendingOffers = Offre::where('statut', 'en attente')
    ->where('date_expiration', '>=', now())
    ->get();
   



    return view('Adm.offres', [
        'pendingOffers' => $pendingOffers,
    ]);
}public function supprimerUtilisateur(Request $request, $id)
{
    $user = User::findOrFail($id);

    $cause = $request->input('cause');

    // Envoi de l'email au user
    Mail::to($user->email)->send(new CompteSupprime($user, $cause));

    // Suppression du compte
    $user->delete();

    return redirect()->route('admin.utilisateurs')->with('success', 'Utilisateur supprimé avec succès.');
}

public function addAdmin(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'contact_phone' => 'required|string',
    ]);

    // Créer un nouvel utilisateur avec le rôle admin
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'type' => 'admin',
        'contact_phone' => $request->contact_phone,
    ]);

   

    return redirect()->route('admin.utilisateurs')->with('success', 'Admin ajouté avec succès.');
}

public function updateProfile(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
        'contact_phone' => 'required|string|max:20',
        'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $admin = auth()->user();

    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->contact_phone = $request->contact_phone;

    if ($request->hasFile('photo_profil')) {
        // Supprimer l'ancienne photo si elle existe
        if ($admin->photo_profil) {
            Storage::delete('public/' . $admin->photo_profil);
        }

        // Enregistrer la nouvelle photo
        $path = $request->file('photo_profil')->store('images', 'public');
        $admin->photo_profil = $path;
    }

    $admin->save();

    return redirect()->back()->with('success', 'Profil mis à jour avec succès');
}
public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required|string|min:8',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    $admin = auth()->user();

    if (!Hash::check($request->current_password, $admin->password)) {
        return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect']);
    }

    $admin->password = Hash::make($request->new_password);
    $admin->save();

    return redirect()->back()->with('success', 'Mot de passe changé avec succès');
}

public function profile()
{
    // Récupérer les informations de l'admin connecté
    $admin = auth()->user();

    // Retourner la vue avec les informations de l'admin
    return view('Adm.profil', compact('admin'));
}
}




