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
            background: var(--light-blue);
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
            font-size: 1.25rem;
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

        .form-section {
            background: var(--white);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            max-width: 800px;
            margin: 1.5rem auto; /* au lieu de 3rem */
        }

        .h1 {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--gray-700);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: var(--gray-700);
            font-size: 0.875rem;
            
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group select,
        .form-group textarea {
            width: 95%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-200);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: var(--gray-700);
            background: var(--white);
            outline: none;
            transition: all 0.2s;
        }
        .form-group select{
            width: 104%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-200);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: var(--gray-700);
            background: var(--white);
            outline: none;
            transition: all 0.2s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 2px rgba(0, 102, 255, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--gray-700);
            margin: 0;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 0.75rem;
            background: var(--primary-blue);
            color: var(--white);
            font-size: 1rem;
            font-weight: 500;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 2rem;
        }

        .submit-btn:hover {
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
            .nav-links {
                display: none;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .footer-content {
                grid-template-columns: 1fr;
            }
        }

        .form-section form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    grid-column: span 1;
    max-width: 94.5%;

}

.form-group.full {
    grid-column: span 2;
    max-width: 100%;
}

.submit-btn {
    grid-column: span 2;
}

@media (max-width: 768px) {
    .form-section form {
        grid-template-columns: 1fr;
    }

    .form-group.full, .submit-btn {
        grid-column: span 1;
    }
}
.hero-section {
            background: var(--light-blue);
            padding: 2rem 0;
            text-align: center;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            color: var(--gray-700);
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .hero-content p {
            color: var(--gray-500);
            font-size: 1.125rem;
            max-width: 600px;
            margin: 0 auto 1rem;
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
            <a href="{{ route('recruteur.index') }}">Mes Offres</a>

        


            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:black ; cursor:pointer; font-size:0.875rem; font-weight: bold;">
                    Déconnexion
                </button>
            </form>
            <a href="{{ route('offres.create') }}" class="post-job-btn">Annoncer</a>
        </div>
    </nav>
<div class="hero-section">
        <div class="hero-content">
            <h1> Créez votre offre dès maintenant</h1>
            <p>Prêt à publier une offre pour votre entreprise ? Choisissez un titre, une description claire, et remplissez les détails essentiels pour attirer les bons candidats.</p>
        </div>
    </div>


    <div class="form-section">
        

        <form action="{{ route('offres.store') }}" method="POST">
            @csrf
            <div class="form-group full">
    <label for="titre">Titre de l'offre</label>
    <input type="text" name="titre" id="titre" required>
</div>

<div class="form-group full">
    <label for="description">Description</label>
    <textarea name="description" id="description" required></textarea>
</div>

<div class="form-group ">
    <label for="type_contrat">Type de contrat</label>
    <input type="text" name="type_contrat" id="type_contrat" required>
</div>

<div class="form-group">
    <label for="location">Localisation</label>
    <input type="text" name="location" id="location" required>
</div>

<div class="form-group ">
    <label for="categorie">Catégorie</label>
    <select name="categorie_id" id="categorie" required>
        <option value="">Sélectionner une catégorie</option>
        @foreach($categories as $categorie)
            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
        @endforeach
    </select>
</div>

<div class="form-group " id="specialites-group" style="display:none;">
    <label for="specialites">Spécialités</label>
    <div class="checkbox-group" id="specialites-list">
        <!-- Dynamique JS -->
    </div>
</div>

<div class="form-group">
    <label for="date_expiration">Date d'expiration</label>
    <input type="date" name="date_expiration" id="date_expiration">
</div>


            <button type="submit" class="submit-btn">Créer l'offre</button>
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
    document.addEventListener('DOMContentLoaded', function () {
        const categorieSelect = document.getElementById('categorie');
        const specialitesGroup = document.getElementById('specialites-group');
        const specialitesList = document.getElementById('specialites-list');

        categorieSelect.addEventListener('change', function() {
            const categorieId = categorieSelect.value;
            
            if (categorieId) {
                specialitesGroup.style.display = 'block';

                fetch(`http://localhost/my-pfaRecrutement/get-specialites/${categorieId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        specialitesList.innerHTML = '';
                        if (data.specialites.length > 0) {
                            data.specialites.forEach(specialite => {
                                const label = document.createElement('label');
                                label.innerHTML = `<input type="checkbox" name="specialites[]" value="${specialite.id}"> ${specialite.nom}`;
                                specialitesList.appendChild(label);
                            });
                        } else {
                            specialitesList.innerHTML = "<p>Aucune spécialité disponible pour cette catégorie.</p>";
                        }
                    })
                    .catch(error => console.log(error));
            } else {
                specialitesGroup.style.display = 'none';
            }
        });
    });
    </script>
</body>
</html>