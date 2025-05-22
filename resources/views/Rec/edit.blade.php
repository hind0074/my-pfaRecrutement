<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RecrutPro - Modifier mon profil</title>
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
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--light-blue);
            margin: 0;
            color: var(--gray-700);
            min-height: 100vh;
            line-height: 1.5;
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
            max-width: 1280px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        

        .edit-form {
            background: var(--white);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        .form-section {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            padding: 1.5rem;
            border-radius: 0.75rem;
            transition: all 0.2s;
        }

        .form-section:hover {
            border-color: var(--primary-blue);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .form-section-title {
            font-size: 1rem;
            font-weight: 600;
            color: #0066FF;
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--gray-100);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
            width: 93%;
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1.5px solid var(--gray-200);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: var(--gray-700);
            background: var(--white);
            transition: all 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.1);
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .file-input-group {
            margin-bottom: 1rem;
            max-width: 93%;
        }

        .file-input-wrapper {
            position: relative;
        }

        .file-input-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem;
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: 0.5rem;
            color: var(--gray-600);
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s;
            width: 100%;
        }

        .file-input-button:hover {
            border-color: var(--primary-blue);
            color: var(--primary-blue);
            background: var(--light-blue);
        }

        .file-input-wrapper input[type="file"] {
            display: none;
        }
        .file-name {
    display: inline-block;
    margin-top: 0.5rem;
    font-size: 0.85rem;
    color: var(--gray-600);
}

        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 2px solid var(--gray-100);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary-blue);
            color: var(--white);
            border: none;
        }

        .btn-primary:hover {
            background: var(--hover-blue);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--gray-700);
            border: 1.5px solid var(--gray-200);
            text-decoration: none;
        }

        .btn-secondary:hover {
            background: var(--gray-50);
            border-color: var(--gray-300);
            text-decoration: none;
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

        @media (max-width: 1024px) {
            .form-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .container {
                padding: 1rem;
            }

            .edit-form {
                padding: 1.5rem;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        @media (max-width: 480px) {
            .btn-group {
                flex-direction: column;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }
        .page-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: var(--gray-600);
            font-size: 1.125rem;
        }

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <span>RecrutPro</span>
        </div>
        <div class="nav-links">
            <a href="{{ route('toutes.offres') }}">Accueil</a>
            <a href="{{ route('entreprises.index') }}">Entreprises</a>
            <a href="{{ route('recruteur.profil') }}" class="active">Mon Profil</a>
            <a href="{{ route('candidatures.index') }}">Candidatures</a>
            <a href="{{ route('recruteur.index') }}">Mes Offres</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:var(--gray-500); cursor:pointer; font-size:0.875rem; font-weight: bold;">
                    Déconnexion
                </button>
            </form>
            <a href="{{ route('offres.create') }}" class="post-job-btn">Annoncer</a>
        </div>
    </nav>

    <div class="container">
    <div class="page-header">
            <h1 class="page-title">Modifier mon profil</h1>
            <p class="page-subtitle">Mettez à jour vos informations personnelles et professionnelles</p>
        </div>

        <form action="{{ route('recruteur.update') }}" method="POST" enctype="multipart/form-data" class="edit-form">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-section">
                <h2 class="form-section-title">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
        <circle cx="8.5" cy="8.5" r="1.5"/>
        <path d="M21 15l-5-5L5 21"/>
    </svg>
    Images
</h2>

                    <div class="file-input-group">
                        <label for="photo_profil">Photo de profil</label>
                        <div class="file-input-wrapper">
                            <input type="file" name="photo_profil" id="photo_profil" accept="image/*">
                            <label for="photo_profil" class="file-input-button">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="17 8 12 3 7 8"/>
                                    <line x1="12" y1="3" x2="12" y2="15"/>
                                </svg>
                                <span class="file-name" id="photo_profil_name">Choisir une photo</span>
                            </label>
                        </div>
                    </div>
                    <div class="file-input-group">
                        <label for="logo">Logo de l'entreprise</label>
                        <div class="file-input-wrapper">
                            <input type="file" name="logo" id="logo" accept="image/*">
                            <label for="logo" class="file-input-button">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="17 8 12 3 7 8"/>
                                    <line x1="12" y1="3" x2="12" y2="15"/>
                                </svg>
                                <span class="file-name" id="logo_name">Choisir un logo</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="form-section-title">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        Informations personnelles
                    </h2>
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" class="form-input" value="{{ old('name', auth()->user()->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-input" value="{{ old('email', auth()->user()->email) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_phone">Téléphone</label>
                        <input type="tel" name="contact_phone" id="contact_phone" class="form-input" value="{{ old('contact_phone', auth()->user()->contact_phone) }}" required>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="form-section-title">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                            <line x1="12" y1="22.08" x2="12" y2="12"/>
                        </svg>
                        Informations de l'entreprise
                    </h2>
                    <div class="form-group">
                        <label for="entreprise">Nom de l'entreprise</label>
                        <input type="text" name="entreprise" id="entreprise" class="form-input" value="{{ old('entreprise', $recruteur->entreprise) }}">
                    </div>
                    <div class="form-group">
                        <label for="poste">Poste</label>
                        <input type="text" name="poste" id="poste" class="form-input" value="{{ old('poste', $recruteur->poste) }}">
                    </div>
                    <div class="form-group">
                        <label for="Localisation">Localisation</label>
                        <input type="text" name="Localisation" id="Localisation" class="form-input" value="{{ old('Localisation', $recruteur->Localisation) }}">
                    </div>
                </div>

                <div class="form-section">
                <h2 class="form-section-title">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/>
        <line x1="2" y1="12" x2="22" y2="12"/>
        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
    </svg>
    Description & Site Web
</h2>
                    <div class="form-group">
                        <label for="website">Site Web</label>
                        <input type="text" name="website" id="website" class="form-input" value="{{ old('website', $recruteur->website) }}" placeholder="https://">
                    </div>
                    <div class="form-group">
                        <label for="descriptionEntreprise">Description de l'entreprise</label>
                        <textarea name="descriptionEntreprise" id="descriptionEntreprise" class="form-input form-textarea" placeholder="Décrivez votre entreprise en quelques lignes...">{{ old('descriptionEntreprise', $recruteur->descriptionEntreprise) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary" style="font-weight: bold;">
                    Mettre à jour mon profil
                </button>
                <a href="{{ route('recruteur.profil') }}" class="btn btn-secondary"  style="font-weight: bold;">
                   
                    Annuler
                </a>
            </div>
        </form>
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
    <script>
    document.getElementById('photo_profil').addEventListener('change', function() {
        const fileName = this.files[0]?.name || 'Aucun fichier choisi';
        document.getElementById('photo_profil_name').textContent = fileName;
    });

    document.getElementById('logo').addEventListener('change', function() {
        const fileName = this.files[0]?.name || 'Aucun fichier choisi';
        document.getElementById('logo_name').textContent = fileName;
    });
</script>

</body>
</html>