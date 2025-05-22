<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RecrutPro - Recruteur</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --primary-blue: #0066FF;
            --light-blue: #f8f9ff;
            --hover-blue: #0052cc;
            --white: #ffffff;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-500: #6b7280;
            --gray-700: #374151;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--white);
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

        .post-job-btn {
            background:  #0066FF;
            color: var(--white) !important;
            padding: 0.5rem 1rem;
            border-radius: 5rem;
            text-decoration: none;
            font-size: 0.875rem;
            transition: background-color 0.2s;
        }

        .post-job-btn:hover {
            background: var(--hover-blue);
        }

        .hero-section {
            width: 100%; /* La largeur sera de 100% de l'écran (ou de son parent) */
    height: 25vh; /* La hauteur est définie à 50% de la hauteur de l'écran */
    background: linear-gradient(rgba(41, 98, 255, 0.9), rgba(30, 136, 229, 0.9)), 
                url('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=1920&q=80');
    background-size: cover; /* L'image s'adapte à la taille du conteneur */
    background-position: center; /* Centrer l'image */
    background-repeat: no-repeat; /* Éviter de répéter l'image */
            padding: 4rem 0;
            text-align: center;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            color:white;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .hero-content p {
            color: white;
            font-size: 1.125rem;
            max-width: 600px;
            margin: 0 auto 2rem;
            font-weight: bold;
        }

        .search-container {
            max-width: 1000px;
            margin: -2rem auto 0;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        .search-section {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .search-form {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1rem;
            align-items: center;
        }

        .search-input {
            position: relative;
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            padding-left: 2.5rem;
        }

        .search-input::before {
            content: "🔍";
            position: absolute;
            left: 1rem;
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .search-input input {
            width: 100%;
            padding: 0.75rem;
            border: none;
            outline: none;
            background: transparent;
            font-size: 0.875rem;
        }

        .search-input .search-btn {
            margin: 4px;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            white-space: nowrap;
            background: var(--primary-blue);
            color: var(--white);
            border: none;
            font-size: 0.875rem;
            cursor: pointer;
            transition: background-color 0.2s;
            
        }
        .search-btn {
            padding: 0.75rem 1.5rem;
            background: var(--primary-blue);
            color: var(--white);
            border: none;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            cursor: pointer;
            transition: background-color 0.2s;
            white-space: nowrap;
        }

        .search-input .search-btn:hover {
            background: var(--hover-blue);
        }

        .search-form select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-200);
            border-radius: 0.5rem;
            outline: none;
            font-size: 0.875rem;
            color: var(--gray-700);
            background: var(--white);
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        .main-content {
            max-width: 1200px;
            margin: 4rem auto 0;
            padding: 0 2rem;
        }

        .job-categories {
            display: flex;
            gap: 1rem;
            margin: 2rem 0;
            flex-wrap: wrap;
        }

        .category-tag {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 2rem;
            color: var(--gray-500);
            font-size: 0.875rem;
            text-decoration: none;
            transition: all 0.2s;
        }

        .category-tag:hover {
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .jobs-container {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 2rem;
        }

        .jobs-list {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .jobs-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .jobs-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-700);
            margin: 0;
        }

        .job-card {
            border: 1px solid var(--gray-200);
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.2s;
            background: var(--white);
        }

        .job-card:hover {
            border-color: var(--primary-blue);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .job-card-header {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .company-logo {
            width: 48px;
            height: 48px;
            border-radius: 0.5rem;
            object-fit: cover;
        }

        .job-info h3 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray-700);
            margin: 0 0 0.25rem 0;
        }

        .job-meta {
            display: flex;
            gap: 1rem;
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .job-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-200);
        }

        .job-type {
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .view-job-btn {
            color: var(--primary-blue);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: bold;
        }
        .view-all-btn {
    font-size: 1rem;
    color: var(--primary-blue);
    font-weight: bold;
    text-decoration: none;
    transition: color 0.2s;
}

.view-all-btn:hover {
    color: var(--hover-blue);
}
        .side-panel {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            height: fit-content;
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

        .post-job-large {
            width: 100%;
            padding: 0.75rem;
            background: var(--primary-blue);
            color: var(--white);
            border: none;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .post-job-large:hover {
            background: var(--hover-blue);
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
            .search-form {
                flex-direction: column;
            }

            .search-input, .search-form select {
                width: 100%;
            }

            .jobs-container {
                grid-template-columns: 1fr;
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
        .nav-links a.active {
    color: var(--primary-blue) !important;
    font-weight: 600;
}
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <span>RecrutPro</span>
        </div>
        <div class="nav-links">
        <a href="{{ route('toutes.offres') }}" 
   class="{{ request()->routeIs('toutes.offres') ? 'active' : '' }}">
   Accueil
</a>

            <a href="{{ route('entreprises.index') }}" 
   class="{{ request()->routeIs('entreprises.index') ? 'active' : '' }}">
   Entreprises
</a>

<a href="{{ route('recruteur.profil') }}" 
   class="{{ request()->routeIs('recruteur.profil') ? 'active' : '' }}">
   Mon Profil
</a>

<a href="{{ route('candidatures.index') }}" 
   class="{{ request()->routeIs('candidatures.index') ? 'active' : '' }}">
   Candidatures
</a>

<a href="{{ route('recruteur.index') }}" 
   class="{{ request()->routeIs('recruteur.index') ? 'active' : '' }}">
   Mes Offres
</a>

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:black; cursor:pointer; font-size:0.875rem; font-weight: bold;">
                    Déconnexion
                </button>
            </form>
            <a href="{{ route('offres.create') }}" class="post-job-btn">Annoncer</a>
        </div>
    </nav>

    <div class="hero-section">
        <div class="hero-content">
            <h1>Trouvez les meilleurs talents</h1>
            <p>Publiez vos offres d'emploi et connectez-vous avec des candidats qualifiés.</p>
        </div>
    </div>

    <div class="search-container">
        <div class="search-section">
            <form class="search-form" method="GET" action="{{ route('recruteur.index') }}">
                <div class="search-input">
                    <input type="text" name="titre" placeholder="Rechercher une offre..." value="{{ request('titre') }}">
                   
                </div>
                <select name="categorie">
            <option value="">Catégorie</option>
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}" {{ request('categorie') == $categorie->id ? 'selected' : '' }}>
                    {{ $categorie->nom }}
                </option>
            @endforeach
         </select>

                <div class="specialite-search-group">
                <select name="specialite">
                    <option value="">Spécialité</option>
                    @foreach ($specialites as $specialite)
                        <option value="{{ $specialite->id }}" {{ request('specialite') == $specialite->id ? 'selected' : '' }}>
                            {{ $specialite->nom }}
                        </option>
                    @endforeach
                </select>
                
                <button type="submit" class="search-btn" style="font-weight: bold;">Rechercher</button>
                </div>
            </form>
        </div>
    </div>

    <div class="main-content">
       

        <div class="jobs-container">
            <div class="jobs-list">
                <div class="jobs-header">
                    <h2 style="color: #0066FF">Offres en cours</h2>
                
              @if($offres_actives->count() > 0)
              <a href="{{ route('recruteur.index', ['voir_toutes_actives' => true]) }}" class="view-job-btn" style=" font-size:0.98rem;">Voir tout →</a>
              @endif
                </div>

                @forelse ($offres_actives as $offre)
                    <div class="job-card">
                        <div class="job-card-header">
                            <img src="{{ 'http://localhost/my-pfaRecrutement/public/storage/' . $logo }}" alt="Logo" class="company-logo">
                            <div class="job-info">
                                <h3>{{ $offre->titre }}</h3>
                                <div class="job-meta">
                                    <span>{{ $offre->type_contrat }}</span>
                                    @foreach ($offre->specialites as $specialite)
                                        <span>{{ $specialite->nom }}@if (!$loop->last), @endif</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="job-actions">
                            <span class="job-type"></span>
                            <a href="{{ route('offre.detail_rec', $offre->id) }}" class="view-job-btn">Voir les détails →</a>
                        </div>
                    </div>
                @empty
                    <p>Aucune offre en cours</p>
                @endforelse

                <div class="jobs-header" style="margin-top: 2rem;">
    <h2 style="color: #0066FF">Offres en attente d''approbation</h2>
    @if($offres_en_attente->count() > 0)
              <a href="{{ route('recruteur.index', ['voir_toutes_attente' => true]) }}" class="view-job-btn" style=" font-size:0.98rem;">Voir tout →</a>
              @endif
</div>

@forelse ($offres_en_attente as $offre)
    <div class="job-card" >
        <div class="job-card-header">
            <img src="{{ 'http://localhost/my-pfaRecrutement/public/storage/' . $logo }}" alt="Logo" class="company-logo">
            <div class="job-info">
                <h3>{{ $offre->titre }}</h3>
                <div class="job-meta">
                    <span>{{ $offre->type_contrat }}</span>
                    @foreach ($offre->specialites as $specialite)
                        <span>{{ $specialite->nom }}@if (!$loop->last), @endif</span>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="job-actions">
            <span class="job-type" style="color: var(--gray-500);">En attente d'approbation</span>
            <a href="{{ route('offre.detail_rec', $offre->id) }}" class="view-job-btn">Voir les détails →</a>
        </div>
    </div>
@empty
    <p>Aucune offre en attente d'approbation</p>
@endforelse



                <div class="jobs-header" style="margin-top: 2rem;">
                    <h2 style="color: #0066FF">Offres expirées</h2>
                  
                    @if($offres_expirees->count() > 0)
              <a href="{{ route('recruteur.index', ['voir_toutes_expirees' => true]) }}" class="view-job-btn" style=" font-size:0.98rem;">Voir tout →</a>
              @endif
                </div>

                @foreach ($offres_expirees->take(3) as $offre)
                    <div class="job-card" style="opacity: 0.7;">
                        <div class="job-card-header">
                            <img src="{{ 'http://localhost/my-pfaRecrutement/public/storage/' . $logo }}" alt="Logo" class="company-logo">
                            <div class="job-info">
                                <h3>{{ $offre->titre }}</h3>
                                <div class="job-meta">
                                    <span>Expirée le {{ \Carbon\Carbon::parse($offre->date_expiration)->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="job-actions">
                            <span class="job-type"></span>
                            <a href="{{ route('offre.detail_rec', $offre->id) }}" class="view-job-btn">Voir les détails →</a>
                        </div>
                    </div>
                @endforeach
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