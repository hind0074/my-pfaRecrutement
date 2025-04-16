<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ecole;
use App\Models\Candidat;
use App\Models\Recruteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
class AuthController 
{
    public function showRegistrationForm()
    {
        $ecoles = Ecole::all(); 
        return view('auth.register', compact('ecoles'));
    }
    public function showPrincipalForm()
    {
        return view('auth.principal');
    }
    
    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'contact_phone' => 'required|string',
        'user_type' => 'required|in:candidat,recruteur,admin'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'contact_phone' => $request->contact_phone,
        'type' => $request->user_type,
    ]);

    if ($request->user_type == 'candidat') {
        $candidat = Candidat::create([
            'user_id' => $user->id,
            'adresse' => $request->adresse,
            'experience' => $request->experience,
            'competences' => $request->competences,
            'langues' => $request->langues,
            'linkedin' => $request->linkedin,
        ]);

        if ($request->ecoles) {
            $dates_debut = $request->dates_debut ?? []; 
            $dates_fin = $request->dates_fin ?? [];
            $diplomes = $request->diplomes ?? [];
        
            foreach ($request->ecoles as $index => $ecole_id) {
                DB::table('candidat_ecole')->insert([
                    'candidat_id' => $candidat->user_id,
                    'ecole_id' => $ecole_id,
                    'date_debut' => $dates_debut[$index] ?? null, 
                    'date_fin' => $dates_fin[$index] ?? null,
                    'diplome' => $diplomes[$index] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        
    } 
    else {
        $logoPath = $request->file('logo') ? $request->file('logo')->store('logos', 'public') : null;

        Recruteur::create([
            'user_id' => $user->id,
            'entreprise' => $request->entreprise,
            'poste' => $request->poste,
            'descriptionEntreprise' => $request->descriptionEntreprise,
            'Localisation' => $request->Localisation,
            'website' => $request->website,
            'logo' => $logoPath,
        ]);
    }

    Auth::login($user);
    return redirect()->route('principal');
}

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();

        
        if ($user->type == 'candidat') {
            return redirect()->route('candidat.toutes.offres');
        } elseif ($user->type == 'recruteur') {
            return redirect()->route('toutes.offres');
        } elseif ($user->type == 'admin') {
            return redirect()->route('register');
        }
    }

    else {
        return back()->withErrors(['email' => 'Identifiants incorrects']);
    }
    
}

public function logout(Request $request)
{
    Auth::logout(); // Déconnecte l'utilisateur
    $request->session()->invalidate(); // Invalide la session
    $request->session()->regenerateToken(); // Régénère le token CSRF

    return redirect()->route('principal');
 // Redirige vers la page d'accueil après la déconnexion
}
}
