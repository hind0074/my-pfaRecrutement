<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntrepriseController
{
    public function index()
    {
        // Définir une liste d'entreprises avec leurs logos
        $entreprises = [
            ['nom' => 'Google', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/27/Google_logo.svg'],
            ['nom' => 'Microsoft', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg'],
            ['nom' => 'Apple', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo.svg'],
            // Ajoute ici d'autres entreprises
        ];

        // Passer les entreprises à la vue
        return view('entreprises.index', compact('entreprises'));
    }
}
