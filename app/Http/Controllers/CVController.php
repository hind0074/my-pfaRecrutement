<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class CVController 
{
    public function show($filename)
    {
        
        

        if (!file_exists($filename)) {
            abort(404);
        }
    
        return response()->file($filename);
}


}