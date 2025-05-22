<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Postuler à l'offre - RecrutPro</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <strong>RecrutPro</strong>
        </div>
        <div class="header-links">
            <a href="{{ route('candidat.toutes.offres') }}">Home</a>
            <a href="#">Entreprises</a>
            <a href="#">About</a>
            <a href="#">Contact Us</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:white; cursor:pointer;">Déconnexion</button>
            </form>
        </div>
    </div>

    <!-- Formulaire de Postulation -->
    <div class="container">
        <h2>Postuler à l'offre : {{ $offre->titre }}</h2>
        <form action="{{ route('offre.postuler', $offre->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="cv">Téléchargez votre CV</label>
                <input type="file" name="cv" id="cv" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
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
