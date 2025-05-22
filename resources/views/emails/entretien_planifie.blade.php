<p>Bonjour {{ $candidat->user->name }},</p>

<p>Votre candidature pour le poste <strong>{{ $offre->titre }}</strong> a été retenue.</p>

<p>Un entretien est prévu le : <strong>{{ \Carbon\Carbon::parse($entretien->date_heure)->format('d/m/Y H:i') }}</strong></p>

<p>Détails : {{ $entretien->message }}</p>

<p>Merci et bonne chance !</p>
