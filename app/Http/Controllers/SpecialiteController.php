<?php

namespace App\Http\Controllers;
use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController
{
    public function getSpecialitesByCategorie($categorieId)
{
    $specialites = Specialite::where('categorie_id', $categorieId)->get(['id', 'nom']);
    return response()->json($specialites);
}
public function parCategorie($id)
{
    $specialites = Specialite::where('categorie_id', $id)->get(['id', 'nom']);
    return response()->json($specialites);
}
public function getSpecialites($id) {
    $specialites = Specialite::where('categorie_id', $id)->get();
    return response()->json($specialites);
}

}
