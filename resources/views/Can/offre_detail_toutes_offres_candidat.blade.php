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
            font-size: 1.25rem;
            font-weight: 600;
            color: #0066FF;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-links a {
            color: var(--gray-500);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--gray-700);
        }

        .nav-links a.active {
            color: var(--primary-blue);
            font-weight: 600;
        }

        .notification-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 33px;
    height: 33px;
    border-radius: 50%;
    background-color: blue;
    border: 1px solid var(--gray-200);
    color: var(--primary-blue);
    transition: all 0.3s ease;
    text-decoration: none;
    position: relative;
}

.notification-btn:hover {
    background-color: var(--primary-blue);
    color: white;
    border-color: var(--primary-blue);
}

.notification-btn .icon {
    width: 22px;
    height: 22px;
    stroke-width: 2;
}
.icon {
  stroke: white;
}
        .container {
            max-width: 100%;
            margin: 2rem auto;
            padding: 0 2rem;
            display: block;
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
            color: var(--gray-500);
            text-decoration: none;
            margin-bottom: 2rem;
            font-size: 0.875rem;
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
            background: var(--primary-blue);
            color: var(--white);
        }

        .btn-warning:hover {
            background:rgb(100, 152, 236);
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
        }

        .footer-section h4 {
            font-size: 0.875rem;
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
            color: var(--gray-500);
            font-size: 0.875rem;
            border-top: 1px solid var(--gray-200);
            margin-top: 2rem;
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
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <span>RecrutPro</span>
        </div>   
        <div class="nav-links">
            <a href="{{ route('candidat.toutes.offres') }}"class="active">Accueil</a>
            <a href="{{ route('entreprises.index') }}">Entreprises</a>
            <a href="{{ route('candidat.profil') }}">Mon Profil</a>
            <a href="{{ route('candidat.candidatures') }}"> Mes Candidatures</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:var(--gray-500); cursor:pointer; font-size:0.875rem;">
                    Déconnexion
                </button>
            </form>
            <a href="#" class="notification-btn" title="Notifications">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 17h5l-1.405-1.405M4 17h5l-1.405-1.405M18 8a6 6 0 00-12 0v5a2 2 0 01-2 2h16a2 2 0 01-2-2V8z" />
    </svg>
</a>
        </div>
    </nav>

    <div class="container">
        <div class="main-content">
            <a href="{{ route('candidat.toutes.offres') }}" class="back-button">
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
                    <strong>Publié:</strong> {{ $offre->created_at->diffForHumans() }}
                </div>
                <div class="job-meta-item">
                    <strong>Date d'expiration:</strong> {{ \Carbon\Carbon::parse($offre->date_expiration)->format('d/m/Y') }}
                </div>
                
            </div>

            <div class="action-buttons">
                <a href=" {{ route('offre.showPostulerForm',$offre->id)}}" class="btn btn-warning" style="text-decoration: none;">
                    Postuler
                </a>
            </div>
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