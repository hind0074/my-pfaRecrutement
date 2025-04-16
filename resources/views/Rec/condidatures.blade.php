@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Candidatures pour l'offre : {{ $offre->titre }}</h1>

        @if($offre->candidats->isEmpty())
            <p>Aucune candidature en attente pour cette offre.</p>
        @else
            <table class="table-auto w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">Candidat</th>
                        <th class="px-4 py-2 border">Date de postulation</th>
                        <th class="px-4 py-2 border">CV</th>
                        <th class="px-4 py-2 border">Statut</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($offre->candidats as $candidat)
                        <tr>
                            <td class="px-4 py-2 border">{{ $candidat->name }}</td>
                            <td class="px-4 py-2 border">{{ $candidat->pivot->date_postulation->format('d/m/Y') }}</td>
                            <td class="px-4 py-2 border">
                                @if($candidat->pivot->cv)
                                    <a href="{{ Storage::url($candidat->pivot->cv) }}" target="_blank" class="text-blue-500">Voir CV</a>
                                @else
                                    Pas de CV
                                @endif
                            </td>
                            <td class="px-4 py-2 border">{{ $candidat->pivot->etat }}</td>
                            <td class="px-4 py-2 border">
                                <!-- Actions d'acceptation et de refus -->
                                <form action="{{ route('candidatures.update', ['offre' => $offre->id, 'candidat' => $candidat->id]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Accepter</button>
                                </form>

                                <form action="{{ route('candidatures.refuse', ['offre' => $offre->id, 'candidat' => $candidat->id]) }}" method="POST" class="inline ml-2">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Refuser</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
