<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RecrutPro - Mon Profil</title>
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
    color: var(--primary-blue) !important;
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

        .container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .profile-header {
            background: var(--white);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .profile-photo {
            position: relative;
        }

        .profile-photo img {
            width: 120px;
            height: 120px;
            border-radius: 1rem;
            object-fit: cover;
            border: 4px solid var(--white);
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .profile-info {
            flex: 1;
        }

        .profile-info h1 {
            font-size: 1.5rem;
            color: var(--gray-900);
            margin: 0 0 0.5rem 0;
        }

        .profile-meta {
            display: flex;
            gap: 1.5rem;
            color: var(--gray-500);
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .profile-actions {
            display: flex;
            gap: 1rem;
           
        }

        .btn {
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--primary-blue);
            color: var(--white);
            border: none;
        }

        .btn-primary:hover {
            background: var(--hover-blue);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--gray-700);
            border: 1px solid var(--gray-200);
        }

        .btn-secondary:hover {
            background: var(--gray-50);
        }

        .profile-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .main-info {
            background: var(--white);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .info-section {
            margin-bottom: 2rem;
        }

        .info-section:last-child {
            margin-bottom: 0;
        }

        .info-section h2 {
            font-size: 1.125rem;
            color: #0066FF;
            margin: 0 0 1rem 0;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .info-item {
            margin-bottom: 1rem;
        }

        .info-item label {
            display: block;
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--gray-500);
            margin-bottom: 0.25rem;
            text-transform: uppercase;
        }

        .info-item p {
            margin: 0;
            color: var(--gray-900);
        }

        .company-info {
            background: var(--white);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .company-logo {
            width: 80px;
            height: 80px;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .footer {
            background: var(--white);
            padding: 2rem;
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
            margin: 0 0 0.75rem 0;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-section li {
            margin-bottom: 0.375rem;
        }

        .footer-section a {
            color: var(--gray-500);
            text-decoration: none;
            font-size: 0.813rem;
            transition: color 0.2s;
        }

        .footer-section a:hover {
            color: var(--primary-blue);
        }

        .copyright {
            text-align: center;
            padding: 1.5rem;
            color: var(--gray-500);
            font-size: 0.813rem;
            border-top: 1px solid var(--gray-200);
            margin-top: 1.5rem;
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
                padding: 1.5rem;
            }

            .profile-meta {
                justify-content: center;
            }

            .profile-actions {
                justify-content: center;
            }

            .profile-content {
                grid-template-columns: 1fr;
            }

            .info-grid {
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
     
   /* Le fond flou */
#overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Fond semi-transparent */
    backdrop-filter: blur(10px); /* Appliquer l'effet de flou */
    z-index: 5;
    display: none; /* Masqué par défaut */
}

/* Formulaire centré */
#passwordForm {
    position: fixed; /* Position fixe sur l'écran */
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Centrage parfait */
    background: var(--white);
    padding: 1.5rem;
    border-radius: 1rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    width: 400px; /* Ajustez la largeur comme souhaité */
    z-index: 10; /* Assurez-vous qu'il est au-dessus du fond flou */
    display: none; /* Commence caché */
}

/* Si vous voulez que le formulaire ait une animation douce */
#passwordForm.fade-in {
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}


#passwordForm .form-group {
    margin-bottom: 1.25rem;
}

#passwordForm label {
    font-size: 0.875rem;
    color: var(--gray-700);
    font-weight: 600;
}

#passwordForm input[type="password"] {
    width: 94%;
    padding: 0.75rem;
    font-size: 1rem;
    border-radius: 0.5rem;
    border: 1px solid var(--gray-200);
    margin-top: 0.25rem;
    color: var(--gray-700);
}

#passwordForm button {
    padding: 0.75rem 1.5rem;
    font-size: 0.875rem;
    border-radius: 0.5rem;
    border: none;
    background: var(--primary-blue);
    color: var(--white);
    cursor: pointer;
    transition: background-color 0.2s;
    margin-top: 1rem;
}

#passwordForm button:hover {
    background: var(--hover-blue);
}

#passwordForm button[type="reset"] {
    background: var(--gray-100);
    color: var(--gray-700);
    margin-left: 1rem;
}

#passwordForm button[type="reset"]:hover {
    background: var(--gray-200);
}
.btn-secondary {
    background: var(--gray-200);
    color: var(--gray-700);
    border: 1px solid var(--gray-200);
}

.btn-secondary:hover {
    background: var(--gray-300);
}



    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <span>RecrutPro</span>
        </div>
        <div class="nav-links">
            <a href="{{ route('candidat.toutes.offres') }}" class="{{ request()->routeIs('candidat.toutes.offres') ? 'active' : '' }}">Accueil</a>
            <a href="{{ route('entreprises.index') }}" class="{{ request()->routeIs('entreprises.index') ? 'active' : '' }}">Entreprises</a>
            <a href="{{ route('candidat.profil') }}" class="{{ request()->routeIs('candidat.profil') ? 'active' : '' }}">Mon Profil</a>
            <a href="{{ route('candidatures.index') }}" class="{{ request()->routeIs('candidatures.index') ? 'active' : '' }}">Mes Candidatures</a>
            
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
        <div class="profile-header">
            <div class="profile-photo">
                @php
                 $photo = $user->photo_profil 
                @endphp
            <img src="{{ asset('http://localhost/my-pfaRecrutement/public/storage/' . $user->photo_profil) }}" alt="photo de profil">
              
            </div>
            <div class="profile-info">
                <h1>{{ $user->name }}</h1>
                <div class="profile-meta">
                    <span>{{ $user->email }}</span>
                    <span>{{ $user->contact_phone }}</span>
                </div>
                <div class="profile-actions">
                    <a href="{{ route('candidat.edit',$user->id) }}" class="btn btn-primary">Modifier mon profil</a>
                    <a href="#" class="btn btn-secondary" onclick="togglePasswordForm(event)">Modifier le mot de passe</a>
                    <div id="overlay"></div> <!-- Fond flou -->

<div id="passwordForm">
    <form method="POST" action="{{ route('candidat.updatePassword') }}">
        @csrf
        <div class="form-group">
            <label for="oldPassword">Ancien mot de passe :</label>
            <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
        </div>
        <div class="form-group">
            <label for="newPassword">Nouveau mot de passe :</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirmer le mot de passe :</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Valider</button>
        <a href="{{ route('candidat.profil') }}" class="btn btn-secondary mt-2">
            
        Annuler</a>

       
    </form>
</div>
                </div>
                
            </div>
        </div>

        <div class="profile-content">
            <div class="main-info">
                <div class="info-section">
                    <h2>Informations personnelles</h2>
                    <div class="info-grid">
                        <div class="info-item">
                            <label>Nom complet</label>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="info-item">
                            <label>Email</label>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="info-item">
                            <label>Téléphone</label>
                            <p>{{ $user->contact_phone }}</p>
                        </div>
                    </div>
                </div>

                @if ($user->candidat)
                <div class="info-section">
                    <h2>Parcours académique </h2>
                    <div class="info-grid">
                <div class="info-item">
                      <label>Parcours académique</label>
                     <ul>
                      @foreach ($user->candidat->ecoles as $ecole)
                      <li>{{ $ecole->nom }} - {{ $ecole->pivot->diplome }}</li>
                      <p> (Début : {{ $ecole->pivot->date_debut }} - Fin :{{ $ecole->pivot->date_fin }})</p>
                      @endforeach
                    </ul>
                </div>
                        
                        
                       
                    </div>
                </div>
                @endif
            </div>

            @if ($candidat)
            <div class="company-info">
                <div class="info-section">
                <h2>Expériences professionnelles</h2>
                <div class="info-item">
                   <label>Expériences professionnelles</label>
                    <p>{{ $user->candidat->experience }}</p>
                  </div>
                    <h2>Aptitudes & Réseaux</h2>
                    <div class="info-item">
                            <label>Compétences</label>
                            <p>{{ $user->candidat->competences }}</p>
                        </div>
                    <div class="info-item">
                        <label> LinkedIn</label>
                        <p>{{ $user->candidat->linkedin }}</p>
                    </div>
                    <div class="info-item">
                            <label>Langues</label>
                            <p>{{ $user->candidat->langues }}</p>
                        </div>
                    
                </div>
            </div>
            @endif

           
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
 function togglePasswordForm(event) {
    event.preventDefault(); // Empêche la redirection
    
    var form = document.getElementById("passwordForm");
    var overlay = document.getElementById("overlay");

    // Si le formulaire est déjà visible, on le cache
    if (form.style.display === "block") {
        form.style.display = "none";
        overlay.style.display = "none";
    } else {
        // Cache tout autre formulaire avant d'afficher celui-ci
        var otherForms = document.querySelectorAll("#passwordForm");
        otherForms.forEach(function (formElement) {
            formElement.style.display = "none";
        });

        // Affiche le formulaire et le fond flou
        form.style.display = "block";
        overlay.style.display = "block";
    }
}


</script>



@if(session('password_updated'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            showCenteredAlert(" Mot de passe modifié avec succès !", "#2962ff");
        });
    </script>
@endif

@if($errors->has('oldPassword'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            showCenteredAlert(" Mot de passe actuel incorrect.", "#dc3545");
        });
    </script>
@endif

@if($errors->has('newPassword'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            showCenteredAlert(" Nouveau mot de passe invalide (min. 6 caractères).", "#dc3545");
        });
    </script>
@endif

<script>
    function showCenteredAlert(message, bgColor) {
        const alertOverlay = document.createElement('div');
        alertOverlay.innerHTML = `
            <div style="
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: ${bgColor};
                color: white;
                padding: 10px 20px;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
                z-index: 9999;
                font-size: 1.2rem;
                text-align: center;
                min-width: 150px;
                max-width: 40%;
            ">
                ${message}
            </div>
        `;
        document.body.appendChild(alertOverlay);

        setTimeout(() => {
            alertOverlay.style.opacity = '0';
            alertOverlay.style.transition = 'opacity 0.6s ease';
            setTimeout(() => alertOverlay.remove(), 400);
        }, 3000);
    }
</script>


</body>
</html>
