<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RecrutPro - Toutes les Offres</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f4f4; }
        .navbar, .footer { background: #2c3e50; color: #fff; padding: 1em 2em; display: flex; justify-content: space-between; align-items: center; }
        .navbar a, .footer a { color: #fff; margin-left: 1em; text-decoration: none; }
        .header-links { display: flex; align-items: center; gap: 1em; }
        .container { padding: 2em; }
        .offer-card { background: white; padding: 1em; border-radius: 8px; margin-bottom: 1em; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .offers-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1em; }
        .site-desc { background: #ecf0f1; text-align: center; padding: 2em; margin-top: 2em; }
    </style>
</head>
<body>

    {{-- 🔹 Navbar --}}
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

    <div class="container">

        {{-- 📢 Liste des offres --}}
        <div class="offers-header">
            <h2>Toutes les offres disponibles</h2>
            <a href="{{ route('candidat.home') }}">Retour à l'accueil</a>
        </div>

        {{-- 🔘 Offres disponibles --}}
        @forelse($offres as $offre)
            <div class="offer-card">
                <h3>{{ $offre->titre }}</h3>
                <p><strong>Entreprise:</strong> {{ $offre->recruteur->entreprise }}</p>
                <p><strong>Type de contrat:</strong> {{ $offre->type_contrat }}</p>
                <p><strong>Publié:</strong> {{ $offre->created_at->diffForHumans() }}</p>
                <a href="{{ route('offre.detail', $offre->id) }}" style="margin-right: 10px;">Voir les détails</a>

                {{-- Formulaire pour postuler --}}
                <form action="{{ route('offre.postuler', $offre->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="cv">Téléchargez votre CV (facultatif):</label>
                        <input type="file" name="cv" id="cv">
                    </div>
                    <button type="submit">Postuler</button>
                </form>
            </div>
        @empty
            <p>Aucune offre disponible pour le moment.</p>
        @endforelse

        {{-- 📜 Pagination --}}
        <div class="pagination">
            {{ $offres->links() }}
        </div>

        {{-- 🧾 Description courte du site --}}
        <div class="site-desc">
            <h2>RecrutPro</h2>
            <p>RecrutPro connecte les talents et les opportunités. Créez votre avenir professionnel avec nous !</p>
        </div>
    </div>

    {{-- 🔻 Footer --}}
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
