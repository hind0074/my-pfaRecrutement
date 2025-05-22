<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Entretien;
use App\Models\Candidat;


class EntretienPlanifie extends Mailable
{
    public $entretien;
    public $candidat;
    public $offre;

    public function __construct(Entretien $entretien)
    {
        $this->entretien = $entretien;

        // S’assurer que le candidat est bien chargé
        $this->candidat = $entretien->candidat;

        // ⚠️ Vérifie qu’il y a bien un candidat
        if (!$this->candidat) {
            throw new \Exception('Candidat introuvable pour cet entretien');
        }

        // Maintenant, récupère l'offre via la relation du candidat
        $this->offre = $this->candidat->offres()->latest()->first(); // ou withPivot('etat')->wherePivot('etat', 'Accepté')->first()

        // ⚠️ Vérifie qu’il y a bien une offre
        if (!$this->offre) {
            throw new \Exception('Aucune offre trouvée pour ce candidat');
        }
    }

    public function build()
    {
        return $this->view('emails.entretien_planifie')
                    ->subject('Entretien planifié pour votre candidature')
                    ->with([
                        'entretien' => $this->entretien,
                        'candidat' => $this->candidat,
                        'offre' => $this->offre,
                    ]);
    }
}