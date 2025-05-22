<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompteSupprime extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $cause;

    public function __construct($user, $cause)
    {
        $this->user = $user;
        $this->cause = $cause;
    }

    public function build()
    {
        return $this->subject('Votre compte a été supprimé')
                    ->view('emails.compte_supprime');
    }
}
