<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Recrutement</title>
    <link rel="stylesheet" href="{{ url('public/assets/css/style.css') }}">
    <style>
        .services,.contact-form {
            padding: 60px 20px;
            background-color: #f9f9f9;
        }
        .panel {
            max-width: 1200px;
            margin: auto;
            text-align: center;
        }
        .services .card, .number, .contact-form form {
            margin-top: 20px;
        }
        .services .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .contact-form form {
            display: flex;
            flex-direction: column;
            max-width: 600px;
            margin: auto;
        }
        .contact-form input, .contact-form textarea {
            margin: 10px 0;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        .contact-form button {
            margin-top: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
        }
        .footer {
            background: var(--white);
            margin-top: 4rem;
            border-top: 1px solid var(--gray-200);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-left: 170px;
        }

        .footer-section h4 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray-700);
            margin: 0 0 1rem 0;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-section li {
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: var(--gray-500);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .footer-section a:hover {
            color: var(--primary-blue);
        }
        


        .copyright {
            text-align: center;
            padding: 2rem;
            color: #2962ff;
            font-size: 0.875rem;
            border-top: 1px solid var(--gray-200);
            margin-top: 2rem;
            font-weight: bold;
        }
        .trust-stats {
    padding: 10px 10px 10px; /* moins d'espace en haut */
    background-color: transparent; /* on garde le même fond */
}

.trust-stats .panel {
    max-width: 100%; /* même largeur que le reste */
    margin: auto;
    text-align: center;
}

.stats-grid {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 30px;
    margin-top: 40px;
}
.stat-box {
    background: #f0f4f8;
    padding: 30px 20px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    min-width: 200px;
}
.stat-box h3 {
    font-size: 2.5rem;
    color: #007bff;
    margin-bottom: 10px;
}
.stat-box p {
    font-size: 1rem;
    color: #555;
}
.form-footer {
    margin-top: 15px;
    font-size: 0.9rem;
    text-align: center;
    color: #555;
}
.form-footer a {
    color: #007bff;
    text-decoration: none;
}
.form-footer a:hover {
    text-decoration: underline;
}

.welcome-section {
    flex: 1;
    max-width: 500px;
    color: white;
    padding-right: 2rem;
    margin-left: 73px; /* Décale légèrement la section vers la droite */
}
.login-form {
    background: #fff;
    padding: 2rem;
    border-radius: 12px;
    width: 360px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    margin-right: 53px;
}
        
    </style>
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
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                    <div class="form-footer">
                        <p>Pas encore de compte ? <a href='{{ route('register') }}'>S'inscrire</a></p>
                        <p><a href="#">Mot de passe oublié ?</a></p>
                    </div>
                </form>
            </div>
        </section>

        <section class="features">
            <h2 >Découvrez ce qui fait notre différence</h2>
           
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

        <section class="features">
        <h2>Ceux qui nous font confiance</h2>
        <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon" style=" font-weight: bold ;"> +50K </div>
                <h3>Entreprises partenaires</h3>
                <p>Un grand nombre d'entreprises font confiance à notre plateforme pour trouver les meilleurs talents.</p>
            </div>
            <div class="feature-card">
                    <div class="feature-icon" style=" font-weight: bold ;"> +100K </div>
                <h3>Candidats actifs</h3>
                <p>Des milliers de candidats sont activement à la recherche de nouvelles opportunités.</p>
            </div>
            <div class="feature-card">
                    <div class="feature-icon" style=" font-weight: bold ;"> 80% </div>
                <h3>Taux de satisfaction</h3>
                <p>Un haut taux de satisfaction parmi nos utilisateurs, preuve de la qualité de notre service.</p>
            </div>
        </div>
    </div>
</section>


       
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Pages</h4>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Département</h4>
                <ul>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Développement</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Niveau</h4>
                <ul>
                    <li><a href="#">Junior</a></li>
                    <li><a href="#">Senior</a></li>
                    <li><a href="#">Expert</a></li>
                    <li><a href="#">Manager</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Localisation</h4>
                <ul>
                    <li><a href="#">Paris</a></li>
                    <li><a href="#">Lyon</a></li>
                    <li><a href="#">Marseille</a></li>
                    <li><a href="#">Bordeaux</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; {{ date('Y') }} RecrutPro. Tous droits réservés.
        </div>
    </footer>
    <!-- ScrollReveal CDN -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        ScrollReveal().reveal('[data-sr]', {
            distance: '40px',
            duration: 1200,
            easing: 'ease-in-out',
            origin: 'bottom',
            interval: 150,
        });
    </script>
</body>
</html>
