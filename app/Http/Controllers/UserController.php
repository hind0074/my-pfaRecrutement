<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserDeleted;
use Illuminate\Http\Request;
use App\Models\User;

class UserController
{
    public function deleteUser(Request $request, User $user)
    {
        // Vérifie que la raison a bien été fournie
        $request->validate([
            'delete_reason' => 'required|string|max:255',
        ]);
    
        // Récupère la raison de la suppression
        $deleteReason = $request->input('delete_reason');
    
        // Supprime l'utilisateur
        try {
            $user->delete();
    
            // Envoie un email à l'utilisateur pour l'informer
            Mail::to($user->email)->send(new UserDeleted($user, $deleteReason));
    
            return response()->json(['success' => 'Utilisateur supprimé et mail envoyé'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la suppression'], 500);
        }
    }
    
}
