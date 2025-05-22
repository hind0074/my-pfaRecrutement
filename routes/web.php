<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\RecruteurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\EntrepriseController;
use App\Models\Specialite;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EntretienController;

Route::get('/', function () {
   return view('welcome'); 
})->name('welcome');



Route::get('/principal', [AuthController::class, 'showPrincipalForm'])->name('principal');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/candidat/offres/{id}', [CandidatController::class, 'show'])->name('candidat.offre.detail');
Route::get('/offre/{id}', [CandidatController::class, 'show'])->name('offre.detail');


Route::get('/offre/{id}', [RecruteurController::class, 'show'])->name('offre.detail_rec');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Liste des offres
Route::get('/candidat/offres', [CandidatController::class, 'allOffres'])->name('candidat.offres');

// Postuler à une offre
// Route pour afficher le formulaire de postulation

Route::get('/recruteur', [RecruteurController::class, 'index'])->name('recruteur.index');
Route::get('/offres/create', [OffreController::class, 'create'])->name('offres.create');
Route::post('/offres', [OffreController::class, 'store'])->name('offres.store');
Route::get('/candidatures', [OffreController::class, 'showRecruteurCandidatures'])->name('candidatures.index');
Route::get('/offres/expirées', [OffreController::class, 'showExpiredOffers'])->name('offres.expirees');
Route::get('/offres/{offre}/edit', [OffreController::class, 'edit'])->name('offres.edit');
Route::put('/offres/{offre}', [OffreController::class, 'update'])->name('offres.update');
Route::delete('/offres/{offre}', [App\Http\Controllers\OffreController::class, 'destroy'])->name('offres.destroy');
// Mise à jour de l'état de la candidature
Route::post('/candidatures/{offre}/{candidat}/updateEtat', [CandidatureController::class, 'updateEtat'])->name('candidatures.updateEtat');

Route::get('/entreprises', [EntrepriseController::class, 'index'])->name('entreprises.index');

Route::get('/api/specialites/by-categorie/{id}', function ($id) {
   return Specialite::where('categorie_id', $id)->get();
});
Route::get('/get-specialites/{categorieId}', [OffreController::class, 'getSpecialites']);
Route::get('/recruteur/profil', [RecruteurController::class, 'showProfil'])->name('recruteur.profil');
Route::get('/toutes-les-offres', [RecruteurController::class, 'toutesLesOffres'])->name('toutes.offres');
Route::put('/recruteur/profil/photo', [RecruteurController::class, 'updatePhoto'])->name('recruteur.updatePhoto');
Route::put('/recruteur/profil', [RecruteurController::class, 'update'])->name('recruteur.update');

Route::get('/recruteur/profil/edit', [RecruteurController::class, 'edit'])->name('recruteur.edit');

Route::get('/offre/ToutesOffres/{id}', [RecruteurController::class, 'showRecToutesOffres'])->name('offre.toutes_offres_detail');
Route::get('/changer-mot-de-passe', [RecruteurController::class, 'editPassword'])->name('recruteur.editPassword');
Route::post('/changer-mot-de-passe', [RecruteurController::class, 'updatePassword'])->name('recruteur.updatePassword');

Route::get('/les-offres-candidat', [CandidatController::class, 'index'])->name('candidat.toutes.offres');
Route::get('/offre/ToutesOffresCandida/{id}', [CandidatController::class, 'showCanToutesOffres'])->name('offre.toutes_offres_detail_candidat');
Route::get('/offre/{offreId}/postuler', [OffreController::class, 'showPostulerForm'])->name('offre.showPostulerForm');
Route::post('/offre/{offreId}/postuler', [OffreController::class, 'postuler'])->name('offre.postuler');
Route::get('/candidat/profil', [CandidatController::class, 'showProfil'])->name('candidat.profil');

// Dans routes/web.php
Route::get('/candidat/{id}/edit', [CandidatController::class, 'edit'])->name('candidat.edit');
Route::get('/changer-mot-de-passe-candidat', [CandidatController::class, 'editPassword'])->name('candidat.editPassword');
Route::post('/changer-mot-de-passe-candidat', [CandidatController::class, 'updatePassword'])->name('candidat.updatePassword');
Route::put('/candidat/profil/photo/candidat', [CandidatController::class, 'updatePhoto'])->name('candidat.updatePhoto');
Route::put('/candidat/{id}', [CandidatController::class, 'update'])->name('candidat.update');
Route::get('/candidat-candidatures', [OffreController::class, 'showCandidatCandidatures'])->name('candidat.candidatures');


Route::post('/entretiens', [EntretienController::class, 'store'])->name('entretiens.store');
Route::delete('/candidatures/{offre}/{candidat}', [CandidatureController::class, 'destroy'])->name('candidatures.destroy');
Route::post('/candidatures/update/{offreId}/{candidatId}', [CandidatureController::class, 'update'])->name('candidatures.update');

Route::get('/notifications', [EntretienController::class, 'showNotifications'])->name('candidat.notifications');
Route::get('/candidat/notifications', [EntretienController::class, 'showNotifications']);

Route::get('/public/storage/{filename}', [App\Http\Controllers\CVController::class, 'show'])->name('cv.show');

Route::get('/admin', [AdminController::class, 'index'])->name('Adm.admin');

Route::post('/offres/{id}/approuver', [AdminController::class, 'approve'])->name('offres.approve');
Route::post('/offres/{id}/refuser', [AdminController::class, 'refuse'])->name('offres.refuse');
Route::get('/admin/utilisateurs', [AdminController::class, 'utilisateurs'])->name('admin.utilisateurs');

Route::prefix('admin')->group(function () {
   Route::get('/categories', [AdminController::class, 'showCategories'])->name('admin.categories');
   Route::post('/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
   Route::post('/specialites', [AdminController::class, 'storeSpecialite'])->name('admin.specialites.store');
});
// Catégorie
Route::put('/admin/categories/{id}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
Route::delete('/admin/categories/delete/{id}', [AdminController::class, 'deleteCategory'])->name('admin.categories.delete');

// Spécialité
Route::put('/admin/specialites/{id}', [AdminController::class, 'updateSpecialite'])->name('admin.specialites.update');
Route::delete('/admin/specialites/delete/{id}', [AdminController::class, 'deleteSpecialite'])->name('admin.specialites.delete');

Route::get('/admin/offres/{id}/detail', [AdminController::class, 'showAdmToutesOffres'])->name('detail.offre');

Route::get('/admin/offres', [AdminController::class, 'offres'])->name('Adm.offres');
Route::post('/admin/utilisateurs/{id}/supprimer', [AdminController::class, 'supprimerUtilisateur'])->name('admin.utilisateurs.supprimer');
Route::POST('/admin/add', [AdminController::class, 'addAdmin'])->name('admin.add');

Route::get('admin/profile', [AdminController::class, 'profile'])->name('profile');
Route::put('admin/updateProfile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
Route::post('admin/changePassword', [AdminController::class, 'changePassword'])->name('admin.changePassword');

Route::get('/recruteur/dashboard', [EntretienController::class, 'indexRecruteur'])->name('entretiens.recruteur');

