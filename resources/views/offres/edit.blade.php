<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RecrutPro - Modifier l'offre</title>
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
            background: var(--light-blue);
            margin: 0;
            color: var(--gray-700);
            min-height: 100vh;
        }

        .navbar {
            background: var(--white);
            padding: 0.75rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--gray-200);
        }

        .navbar .logo {
            font-size: 1.30rem;
            font-weight: 600;
            color:  #0066FF;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-links a {
            color:black;
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
            padding: 0.5rem 1rem;
            border-radius: 5rem;
            text-decoration: none;
            font-size: 0.875rem;
            transition: background-color 0.2s;
        }

        .post-job-btn:hover {
            background: var(--hover-blue);
        }
        .form-header h1 {
            font-size: 2rem;
            color: var(--gray-700);
            margin-bottom: 1rem;
            font-weight: 600;
            margin: 1.5rem auto;
        }
     
        .container {
            max-width: 1000px;
            margin: 1.5rem auto;
            padding: 0 1.5rem;
            
        }

        .form-header {
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        
        .form-section {
            background: var(--white);
           padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: -3rem;
            
        }

        .form-group {
            margin-bottom: 0rem;
            padding: 2rem;
            
        }

        .form-group label {
            display: block;
            font-size: 0.900rem;
            font-weight: bold;
            color: var(--gray-700);
            margin-bottom: 0.375rem;
        }

        .form-group input{
            width: 93%;
            padding: 0.625rem;
            border: 1px solid var(--gray-200);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: all 0.2s;
            background: var(--white);
        }
        .form-group textarea {
            width: 98%;
            padding: 0.625rem;
            border: 1px solid var(--gray-200);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: all 0.2s;
            background: var(--white);
            margin-top: 0rem;
        }
        .form-group select {
            width: 102%;
            padding: 0.625rem;
            border: 1px solid var(--gray-200);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: all 0.2s;
            background: var(--white);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 2px rgba(0,102,255,0.1);
        }

        .form-group textarea {
            height: 100px;
            resize: none;
        }

        .span-2 {
            grid-column: span 2;
        }

        .span-3 {
            grid-column: span 3;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 0.5rem;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 0.375rem;
            font-size: 0.813rem;
            margin: 0;
            cursor: pointer;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin: 0;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-200);
        }

        .btn {
            padding: 0.625rem 1.25rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .submit-btn {
            background: var(--primary-blue);
            color: var(--white);
            border: none;
        }

        .submit-btn:hover {
            background: var(--hover-blue);
        }

        .cancel-btn {
            background: var(--white);
            color: var(--gray-700);
            border: 1px solid var(--gray-200);
            text-decoration: none;
        }

        .cancel-btn:hover {
            background: var(--gray-100);
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
       

        .copyright {
            text-align: center;
            padding: 2rem;
            color: #2962ff;
            font-size: 0.875rem;
            border-top: 1px solid var(--gray-200);
            margin-top: 2rem;
            font-weight: bold;
        }
        .specialite-search-group {
            display: flex;
            gap: 1rem;
            align-items: center;
        }


        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .span-2, .span-3 {
                grid-column: auto;
            }

            .actions {
                flex-direction: column;
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
            <a href="{{ route('toutes.offres') }}">Accueil</a>
            <a href="{{ route('entreprises.index') }}">Entreprises</a>
            <a href="{{ route('recruteur.profil') }}">Mon Profil</a>
            <a href="{{ route('candidatures.index') }}">Candidatures</a>
            <a href="{{ route('recruteur.index') }}" class="active">Mes Offres</a>
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
        <div class="form-header">
        <h1>Mettez à jour les détails de votre offre ici</h1>
        </div>
        
        <div class="form-section">
            <form action="{{ route('offres.update', $offre->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group ">
                        <label for="titre">Titre</label>
                        <input type="text" name="titre" id="titre" value="{{ old('titre', $offre->titre) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="type_contrat">Type de contrat</label>
                        <input type="text" name="type_contrat" id="type_contrat" value="{{ old('type_contrat', $offre->type_contrat) }}" required>
                    </div>

                    <div class="form-group" >
                        <label for="location" >Localisation</label>
                        <input type="text" name="location" id="location" value="{{ old('location', $offre->location) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="date_expiration">Date d'expiration</label>
                        <input type="date" name="date_expiration" id="date_expiration" 
                            value="{{ old('date_expiration', $offre->date_expiration ? \Carbon\Carbon::parse($offre->date_expiration)->format('Y-m-d') : '') }}">
                    </div>

                    <div class="form-group ">
                        <label for="categorie">Catégorie</label>
                        <select id="categorie" name="categorie_id" required>
                            <option value="">Sélectionner une catégorie</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}" 
                                    {{ old('categorie_id', $categorieId) == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group " id="specialites-group" style="display: none;">
                        <label for="specialites">Spécialités</label>
                        <div class="checkbox-group" id="specialites-list">
                            <!-- Les spécialités seront chargées ici dynamiquement -->
                        </div>
                    </div>

                    <div class="form-group span-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" required>{{ old('description', $offre->description) }}</textarea>
                    </div>

                    
                </div>

                <div class="actions">
                    <a href="{{ route('recruteur.index') }}" class="btn cancel-btn" style=" font-weight: bold;" >Annuler</a>
                    <button type="submit" class="btn submit-btn" style=" font-weight: bold;" >Enregistrer les modifications</button>
                </div>
            </form>
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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const categorieSelect = document.getElementById('categorie');
        const specialitesGroup = document.getElementById('specialites-group');
        const specialitesList = document.getElementById('specialites-list');

        if (!specialitesList) {
            console.error("L'élément avec l'ID specialites-list est introuvable.");
            return;
        }

        const selectedSpecialites = @json($offre->specialites->pluck('id')->toArray());

        categorieSelect.addEventListener('change', function () {
            const categorieId = categorieSelect.value;

            if (categorieId) {
                specialitesGroup.style.display = 'block';

                fetch(`http://localhost/my-pfaRecrutement/get-specialites/${categorieId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erreur du serveur: ' + response.status);
                        }
                        return response.json();
                    })
                    .then(data => {
                        specialitesList.innerHTML = '';

                        if (data.specialites && data.specialites.length > 0) {
                            data.specialites.forEach(specialite => {
                                const label = document.createElement('label');
                                label.innerHTML = `
                                    <input type="checkbox" name="specialites[]" value="${specialite.id}" 
                                    ${selectedSpecialites.includes(specialite.id) ? 'checked' : ''}>
                                    ${specialite.nom}
                                `;
                                specialitesList.appendChild(label);
                            });
                        } else {
                            specialitesList.innerHTML = "<p>Aucune spécialité disponible pour cette catégorie.</p>";
                        }
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des spécialités :', error);
                        specialitesList.innerHTML = "<p>Une erreur est survenue lors de la récupération des spécialités.</p>";
                    });
            } else {
                specialitesGroup.style.display = 'none';
            }
        });

        if (categorieSelect.value) {
            categorieSelect.dispatchEvent(new Event('change'));
        }
    });
    </script>
</body>
</html>