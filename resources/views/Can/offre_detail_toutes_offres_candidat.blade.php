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
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.30rem;
            color: #0066FF;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-links a {
            color:black;
            font-weight: bold;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--gray-700);
        }
        .nav-links a.active {
       color: var(--primary-blue) !important;
       font-weight: bold;
}


        .notification-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 33px;
    height: 33px;
    border-radius: 50%;
    background-color: #0066FF;
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
            color:  #0066FF;
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
            border-radius: 20rem;
            font-weight: bold;
        }

        .btn-warning:hover {
            background:#0052cc;
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
        #postuler-form {
    display: none;
    margin-top: 2rem;
    background: var(--white);
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 2px 10px rgba(0, 102, 255, 0.1);
    transition: all 0.3s ease;
}



#postuler-form .btn-primary {
    background: var(--primary-blue);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 11rem;
    border: none;
    margin-top: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#postuler-form .btn-primary:hover {
    background: var(--hover-blue);
}

        .form-group {
            margin-bottom: 15px;
        }

        .file-input-group {
            margin-bottom: 1rem;
            max-width: 97.5%;
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


.notifications-dropdown {
    position: absolute;
    top: calc(9% + 1rem);
    right:0.3rem;
    width: 400px;
    background: white;
    border-radius: 1rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    border: 1px solid var(--gray-200);
    z-index: 50;
    max-height: 500px;
    overflow-y: auto;
    display: none;
    

}

.notifications-dropdown.active {
    display: block;
    animation: slideDown 0.2s ease-out forwards;
}

.notifications-header {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid var(--gray-200);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.notifications-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--gray-700);
}

.notification-item {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid var(--gray-200);
    transition: all 0.2s;
    
}

.notification-item:hover {
    background: var(--light-blue);
}

.notification-item.success {
    border-left: 4px solid #10B981;
}

.notification-item.error {
    border-left: 4px solid #EF4444;
}

.notification-content {
    margin-bottom: 0.5rem;
}

.notification-title {
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: 0.25rem;
}

.notification-message {
    font-size: 0.875rem;
    color: var(--gray-500);
}

.notification-time {
    font-size: 0.75rem;
    color: var(--gray-400);
}

.notifications-footer {
    padding: 1rem 1.5rem;
    text-align: center;
    border-top: 1px solid var(--gray-200);
}

.view-all-notifications {
    color: var(--primary-blue);
    font-weight: 600;
    text-decoration: none;
    font-size: 0.875rem;
    transition: color 0.2s;
}

.view-all-notifications:hover {
    color: var(--hover-blue);
}

.notification-badge {
    position: absolute;
    top: 11px;
    right: 27px;
    background: #EF4444;
    color: white;
    border-radius: 50%;
    width: 19px;
    height: 19px;
    font-size: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.notification-btn {
    position: relative;
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
                <button type="submit" style="background:none; border:none; color:black; cursor:pointer; font-size:0.875rem; font-weight: bold;">
                    Déconnexion
                </button>
            </form>
            <a href="{{ route('candidat.notifications') }}" class="notification-btn" title="Notifications">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 17h5l-1.405-1.405M4 17h5l-1.405-1.405M18 8a6 6 0 00-12 0v5a2 2 0 01-2 2h16a2 2 0 01-2-2V8z" />
    </svg>
</a>



<div class="notifications-dropdown">
    <div class="notifications-header">
        <span class="notifications-title">Notifications</span>
    </div>
    
    @if($entretiens->isEmpty() && $candidaturesRefusees->isEmpty())
        <div class="notification-item">
            <div class="notification-content">
                <div class="notification-message">Aucune notification pour le moment</div>
            </div>
        </div>
    @else
        @foreach($entretiens as $entretien)
            <div class="notification-item success">
                <div class="notification-content">
                    <div class="notification-title">Entretien Confirmé</div>
                    <div class="notification-message">
                        Félicitations ! Vous avez été sélectionné(e) pour un entretien concernant le poste <strong>{{ $entretien->offre->titre }}</strong>.
                    </div>
                </div>
                <div class="notification-time">
                    {{ \Carbon\Carbon::parse($entretien->created_at)->diffForHumans() }}
                </div>
            </div>
        @endforeach

        @foreach($candidaturesRefusees as $candidature)
            <div class="notification-item error">
                <div class="notification-content">
                    <div class="notification-title">Candidature Non Retenue</div>
                    <div class="notification-message">
                        Votre candidature pour le poste <strong>{{ $candidature->offre->titre }}</strong> n'a pas été retenue.
                    </div>
                </div>
                <div class="notification-time">
                    {{ \Carbon\Carbon::parse($candidature->updated_at)->diffForHumans() }}
                </div>
            </div>
        @endforeach
    @endif
    
    <div class="notifications-footer">
        <a href="{{ route('candidat.notifications') }}" class="view-all-notifications">
            Voir toutes les notifications →
        </a>
    </div>
</div>

<!-- Add this to your notification button -->
@if(($entretiens->count() + $candidaturesRefusees->count()) > 0)
    <div class="notification-badge">
        {{ $entretiens->count() + $candidaturesRefusees->count() }}
    </div>
@endif

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
                    <div class="job-meta-item"  style=" font-weight: bold; ">
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

                        <div class="job-meta-item"  style=" font-weight: bold; ">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            {{ $offre->location }}
                        </div>
                        <div class="job-meta-item"  style=" font-weight: bold; ">
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
                        <span class="specialite-tag"  style=" font-weight: bold; ">{{ $specialite->nom }}</span>
                    @endforeach
                </div>
            </div>

            <div class="job-meta">
                <div class="job-meta-item"  style=" font-weight: bold; ">
                    <span>Publié:</span> {{ $offre->created_at->diffForHumans() }}
                </div>
                <div class="job-meta-item" style=" font-weight: bold; ">
                    <span >Date d'expiration:</span> {{ \Carbon\Carbon::parse($offre->date_expiration)->format('d/m/Y') }}
                </div>
                
            </div>

            <div class="action-buttons" style=" font-weight: bold;">
                <button id="postuler-btn" class="btn btn-warning">
                    Postuler
                </button>
            </div>
            <div id="postuler-form">
                <form action="{{ route('offre.postuler', $offre->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="file-input-group">
                        <div class="file-input-wrapper">
                        <input type="file" name="cv" id="cv-input" accept="application/pdf, .doc, .docx">
<label for="cv-input" class="file-input-button">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
        <polyline points="17 8 12 3 7 8"/>
        <line x1="12" y1="3" x2="12" y2="15"/>
    </svg>
    <span class="file-name" id="file-name" style=" font-weight: bold;">Téléchargez votre CV</span>
</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
            <div id="success-alert" style="
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #0066FF;
    color: white;
    padding: 1rem 2rem;
    border: 1px solid #0066FF;
    border-radius: 10px;
    z-index: 9999;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    font-weight: bold;
">
     Votre candidature a été envoyée avec succès !
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
    <script>
        // Ajoute un événement au bouton "Postuler"
        document.getElementById('postuler-btn').addEventListener('click', function() {
            var form = document.getElementById('postuler-form');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });
        const form = document.querySelector('#postuler-form form');
    form.addEventListener('submit', function (e) {
       
        // Affiche l'alerte
        const alertBox = document.getElementById('success-alert');
        alertBox.style.display = 'block';

        // Optionnel : masquer l'alerte après 3 secondes
        setTimeout(() => {
            alertBox.style.display = 'none';
        }, 6000);

        // Optionnel : si tu veux envoyer le formulaire réellement après coup
        // e.target.submit(); // décommente si besoin
    });
    </script>
   <script>
    const input = document.getElementById('cv-input');
    const fileNameSpan = document.getElementById('file-name');

    input.addEventListener('change', function () {
        if (this.files.length > 0) {
            fileNameSpan.textContent = this.files[0].name;
        } else {
            fileNameSpan.textContent = 'Téléchargez votre CV';
        }
    });
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const notificationBtn = document.querySelector('.notification-btn');
    const notificationsDropdown = document.querySelector('.notifications-dropdown');
    
    notificationBtn.addEventListener('click', function(e) {
        e.preventDefault();
        notificationsDropdown.classList.toggle('active');
        e.stopPropagation();
    });

    document.addEventListener('click', function(e) {
        if (!notificationsDropdown.contains(e.target) && !notificationBtn.contains(e.target)) {
            notificationsDropdown.classList.remove('active');
        }
    });
});
</script>
</body>
</html>