@forelse ($offres as $offre)
    <h3>{{ $offre->titre }}</h3>

    @if ($offre->candidats->isNotEmpty())
        <ul>
        @foreach ($offre->candidats as $candidat)
    <li>
        <strong>{{ $candidat->nom }}</strong> - 
        Postulé le {{ \Carbon\Carbon::parse($candidat->pivot->date_postulation)->format('d/m/Y') }}
        <br>
        CV : <a href="{{ route('cv.show', ['filename' => $candidat->pivot->cv]) }}" target="_blank">Voir le CV</a>
        <br>
        État : {{ $candidat->pivot->etat }}

        <!-- Bouton qui déclenche le formulaire -->
        <button type="button" onclick="showEntretienForm({{ $offre->id }}, {{ $candidat->user_id }})" class="btn btn-success">
    Accepter
</button>


        <!-- Formulaire d'entretien (caché au début) -->
        <form action="{{ route('entretiens.store') }}" method="POST" id="form-entretien-{{ $offre->id }}-{{ $candidat->user_id }}" style="display: none;">

            @csrf
            <input type="hidden" name="offre_id" value="{{ $offre->id }}">
            <input type="hidden" name="candidat_id" value="{{ $candidat->user_id }}">
            <div>
                <label for="date_heure">Date & heure de l'entretien :</label>
                <input type="datetime-local" name="date_heure" required>
            </div>
            <div>
                <label for="message">Message / Lieu / Plateforme :</label>
                <textarea name="message" rows="2" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Valider l'entretien</button>
        </form>
    </li>
@endforeach
        </ul>
    @else
        <p>Aucune candidature pour cette offre.</p>
    @endif
@empty
    <p>Aucune offre trouvée.</p>
@endforelse
<script>
    function showEntretienForm(offreId, candidatId) {
        const formId = `form-entretien-${offreId}-${candidatId}`;
        const form = document.getElementById(formId);

        if (form) {
            form.style.display = 'block';
        } else {
            console.error('Formulaire introuvable pour :', formId);
        }
    }
</script>

