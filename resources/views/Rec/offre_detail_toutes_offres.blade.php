<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Detail offre</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --primary-blue: #0066FF;
            --light-blue: #f8f9ff;
            --hover-blue: #0052cc;
            --white: #ffffff;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-500: #6b7280;
            --gray-700: #374151;
            --yellow-500: #f59e0b;
            --yellow-600: #d97706;
            --red-600: #dc2626;
            --red-700: #b91c1c;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--gray-50);
            margin: 0;
            color: var(--gray-700);
            min-height: 100vh;
        }

        .navbar {
            background: var(--white);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--gray-200);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.30rem;
            font-weight: 600;
            color:  #0066FF;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-links a {
            color: black;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
            font-weight: bold;
        }

        .nav-links a:hover {
            color: var(--gray-700);
        }

        .nav-links a.active {
            color: var(--primary-blue);
            font-weight: 600;
        }

        .post-job-btn {
            background: var(--primary-blue);
            color: var(--white) !important;
            padding: 0.5rem 1.5rem;
            border-radius: 9999px;
            text-decoration: none;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .post-job-btn:hover {
            background: var(--hover-blue);
            transform: translateY(-1px);
        }

        .container {
            max-width: 100%;
            margin: 2rem auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 2rem;
        }

        .main-content {
            background: var(--white);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #0066FF;
            text-decoration: none;
            margin-bottom: 2rem;
            font-size: 1rem;
            font-weight: bold;
        }

        .back-button:hover {
            color: var(--gray-700);
        }

        .job-header {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .logo-container {
            flex-shrink: 0;
        }

        .logo-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .job-info h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gray-700);
            margin: 0 0 1rem 0;
        }

        .job-meta {
            display: flex;
            gap: 1.5rem;
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .job-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: bold;
        }

        .job-description {
            margin: 2rem 0;
            line-height: 1.6;
            color: var(--gray-600);
            
        }

        .specialites {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .specialite-tag {
            background: var(--light-blue);
            color: var(--primary-blue);
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: bold;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-200);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }

        .btn-warning {
            background: var(--yellow-500);
            color: var(--white);
        }

        .btn-warning:hover {
            background: var(--yellow-600);
        }

        .btn-danger {
            background: var(--red-600);
            color: var(--white);
        }

        .btn-danger:hover {
            background: var(--red-700);
        }

        .side-panel {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            height: fit-content;
            max-width: 150%;
        }

        .side-panel h3 {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-700);
            margin: 0 0 0.5rem 0;
        }

        .side-panel p {
            color: var(--gray-500);
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }

        .post-job-large {
            width: 100%;
            padding: 0.75rem;
            background: var(--primary-blue);
            color: var(--white);
            border: none;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .post-job-large:hover {
            background: var(--hover-blue);
            transform: translateY(-1px);
        }

        .footer {
            background: var(--white);
            padding: 4rem 2rem;
            margin-top: 4rem;
            border-top: 1px solid var(--gray-200);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-left: 120px;
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
            font-weight: bold;
        }

        .footer-section a:hover {
            color: var(--primary-blue);
        }
        .specialite-search-group {
            display: flex;
            gap: 1rem;
            align-items: center;
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


        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }

            .job-header {
                flex-direction: column;
            }

            .job-meta {
                flex-wrap: wrap;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .nav-links {
                display: none;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }
        .job-icon {
  display: flex;
  justify-content: center;
  align-items: center;
  background: #eff6ff;
  border-radius: 25%;
  width: 44px;
  height: 44px;
  margin-bottom: 15px;
}

.side-panel h3 {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 8px;
  color: #111827;
}

.job-desc {
  font-size: 0.9rem;
  color: #6b7280;
  margin-bottom: 16px;
}

.cta-main {
  display: inline-block;
  background-color: #2563eb;
  color: white;
  padding: 10px 20px;
  border-radius: 9999px;
  text-decoration: none;
  font-size: 0.9rem;
  font-weight: 500;
  transition: background 0.2s ease;
}

.cta-main:hover {
  background-color: #1e40af;
}
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <span>RecrutPro</span>
        </div>
        <div class="nav-links">
            <a href="{{ route('toutes.offres') }}"class="active">Accueil</a>
            <a href="{{ route('entreprises.index') }}">Entreprises</a>
            <a href="{{ route('recruteur.profil') }}">Mon Profil</a>
            <a href="{{ route('candidatures.index') }}">Candidatures</a>
            <a href="{{ route('recruteur.index') }}" >Mes Offres</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:black; cursor:pointer; font-size:0.875rem; font-weight: bold;">
                    Déconnexion
                </button>
            </form>
            <a href="{{ route('offres.create') }}" class="post-job-btn">Annoncer</a>
        </div>
    </nav>

    <div class="container">
        <div class="main-content">
            <a href="{{ route('toutes.offres') }}" class="back-button">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
                Retour aux offres
            </a>

            <div class="job-header">
                <div class="logo-container">
                    <img src="{{ 'http://localhost/my-pfaRecrutement/public/storage/' . $offre->recruteur->logo }}" alt="Logo entreprise" class="logo-img">
                </div>
                <div class="job-info">
                    <h2>{{ $offre->titre }}</h2>
                    <div class="job-meta">
                    <div class="job-meta-item">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M3 21V7a2 2 0 0 1 2-2h3V3h8v2h3a2 2 0 0 1 2 2v14"/>
        <path d="M9 21v-4h6v4"/>
        <path d="M10 11h.01"/>
        <path d="M14 11h.01"/>
        <path d="M10 15h.01"/>
        <path d="M14 15h.01"/>
    </svg>
    {{ $offre->recruteur->entreprise }}
</div>

                        <div class="job-meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            {{ $offre->location }}
                        </div>
                        <div class="job-meta-item">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M6 2h9l5 5v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z"/>
        <polyline points="14 2 14 8 20 8"/>
    </svg>
    {{ $offre->type_contrat }}
</div>
                    </div>
                </div>
            </div>

            <div class="job-description">
                <h3>Description</h3>
                <p>{{ $offre->description }}</p>
            </div>

            <div class="specialites">
                <h3>Spécialités requises</h3>
                <div class="specialites">
                    @foreach ($offre->specialites as $specialite)
                        <span class="specialite-tag">{{ $specialite->nom }}</span>
                    @endforeach
                </div>
            </div>

            <div class="job-meta">
                <div class="job-meta-item">
                    <span>Publié:</span> {{ $offre->created_at->diffForHumans() }}
                </div>
                <div class="job-meta-item">
                    <span>Date d'expiration:</span> {{ \Carbon\Carbon::parse($offre->date_expiration)->format('d/m/Y') }}
                </div>
            </div>

            
        </div>

        <div class="side-panel">
  <!-- Icône -->
  <div class="job-icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#2563eb">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M16 7V5a2 2 0 00-2-2H10a2 2 0 00-2 2v2M4 7h16v12a2 2 0 01-2 2H6a2 2 0 01-2-2V7z" />
    </svg>
  </div>

  <!-- Titre -->
  <h3>Postez une offre aujourd'hui</h3>

  <!-- Description -->
  <p class="job-desc">Publiez une offre pour trouver des talents.</p>

  <!-- Bouton principal -->
  <a href="{{ route('offres.create') }}" class="cta-main" style="font-weight: bold;">Annoncer </a>

  
  
</div>
    </div>

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
</body>
</html>