<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'Offre - RecrutPro</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <strong>RecrutPro</strong>
        </div>
        <div class="header-links">
            <a href="{{ route('candidat.home') }}">Home</a>
            <a href="#">Entreprises</a>
            <a href="#">About</a>
            <a href="#">Contact Us</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:white; cursor:pointer;">Déconnexion</button>
            </form>
        </div>
    </div>

    <!-- Détails de l'offre -->
    <div class="container">
        <h2>{{ $offre->titre }}</h2>
        <p><strong>Entreprise:</strong> {{ $offre->recruteur->entreprise }}</p>
        <p><strong>Description:</strong> {{ $offre->description }}</p>
        <p><strong>Type de contrat:</strong> {{ $offre->type_contrat }}</p>
        <p><strong>Publié:</strong> {{ $offre->created_at->diffForHumans() }}</p>

        <!-- Bouton pour postuler -->
        <form action="{{ route('offre.showPostulerForm', $offre->id) }}" method="GET">
            <button type="submit">Postuler</button>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div>
            <a href="#">Contact Us</a>
            <a href="#">About</a>
        </div>
        <div>
            <span>Instagram</span> |
            <span>&copy; {{ date('Y') }} RecrutPro. Tous droits réservés.</span>
        </div>
    </div>

</body>
</html>
