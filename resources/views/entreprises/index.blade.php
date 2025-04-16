<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Entreprises</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Liste des Entreprises</h1>

        <div class="entreprises-list">
            @foreach ($entreprises as $entreprise)
                <div class="entreprise">
                    <h2>{{ $entreprise['nom'] }}</h2>
                    <img src="{{ $entreprise['logo'] }}" alt="Logo de {{ $entreprise['nom'] }}" style="width: 100px; height: 100px;">
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
