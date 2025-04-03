<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Recrutement</title>
    <link rel="stylesheet" href="{{ url('public/assets/css/style.css') }}">

</head>
<body>
    <header class="header">
        <nav class="nav">
            <div class="logo">
               
                <span>RecruitPro</span>
            </div>
            <ul class="nav-links">
                <li><a href="#" class="active">Accueil</a></li>
                <li><a href="#">Emplois</a></li>
                <li><a href="#">Entreprises</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="welcome-section">
                <h1>Bienvenue sur RecruitPro</h1>
                <p>Votre partenaire de confiance pour trouver les meilleurs talents et opportunités professionnelles.</p>
            </div>
            
            <div class="login-form">
                <h2>Connexion</h2>
                <form action="{{ route('login') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Votre email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" placeholder="Votre mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-primary" >Se connecter</button>
                    <div class="footer">
                        <p>Pas encore de compte ? <a href='{{ route('register') }}'>S'inscrire</a></p>
                        
                        <p><a href="#">Mot de passe oublié ?</a></p>
                    </div>
                </form>
            </div>
        </section>

        <section class="features">
            <h2>Pourquoi nous choisir</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <h3>Matching Intelligent</h3>
                    <p>Algorithme avancé pour trouver les meilleurs candidats</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💼</div>
                    <h3>Offres Exclusives</h3>
                    <p>Accès aux meilleures opportunités du marché</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <h3>Processus Rapide</h3>
                    <p>Recrutement simplifié et efficace</p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>