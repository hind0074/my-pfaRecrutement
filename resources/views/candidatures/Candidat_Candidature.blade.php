@forelse ($offres as $offre)
    <h3>{{ $offre->titre }}</h3>

    @if ($offre->candidats && $offre->candidats->isNotEmpty())
        <ul>
            @foreach ($offre->candidats as $candidat)
                <li>
                    <strong>{{ $candidat->nom }}</strong> - Postulé le {{ \Carbon\Carbon::parse($candidat->pivot->date_postulation)->format('d/m/Y') }}<br>
                    CV : <a href="{{ route('cv.show', ['filename' => $candidat->pivot->cv]) }}" target="_blank">Voir le CV</a><br>
                    État : {{ $candidat->pivot->etat }}
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune candidature pour cette offre.</p>
    @endif
@empty
    <p>Aucune offre trouvée.</p>
@endforelse
