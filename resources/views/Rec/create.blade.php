@extends('layouts.app') {{-- ou le layout que tu utilises --}}

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Créer une nouvelle offre</h1>

    <form action="{{ route('offres.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Titre de l'offre</label>
            <input type="text" name="titre" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Description</label>
            <textarea name="description" rows="5" class="w-full border border-gray-300 p-2 rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Type de contrat</label>
            <select name="type_contrat" class="w-full border border-gray-300 p-2 rounded" required>
                <option value="">-- Sélectionner --</option>
                <option value="CDI">CDI</option>
                <option value="CDD">CDD</option>
                <option value="Stage">Stage</option>
                <option value="Freelance">Freelance</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Date d'expiration</label>
            <input type="date" name="date_expiration" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Spécialités concernées</label>
            <select name="specialites[]" multiple class="w-full border border-gray-300 p-2 rounded">
                @foreach($specialites as $specialite)
                    <option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
                @endforeach
            </select>
            <small class="text-gray-500">Utilise Ctrl/Cmd pour sélectionner plusieurs.</small>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Enregistrer l'offre
        </button>
    </form>
</div>
@endsection
