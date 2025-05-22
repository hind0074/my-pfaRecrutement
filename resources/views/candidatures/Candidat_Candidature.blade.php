<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecrutPro - Candidatures</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --primary: #0a66c2;
            --primary-dark: #004182;
            --primary-light: #e8f3ff;
            --success: #057642;
            --success-light: #ecfdf3;
            --pending: #ca8a04;
            --pending-light: #fef9c3;
            --danger: #be123c;
            --danger-light: #ffe4e6;
            --surface: #ffffff;
            --background: #f3f4f6;
            --border: #e5e7eb;
            --text: #111827;
            --text-light: #6b7280;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        }

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
            background: white;
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

        .main-container {
            max-width: 1280px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .page-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: #0066FF;
            margin-bottom: 2rem;
          text-align: center;
        }

        .applications-grid {
            display: grid;
            gap: 1.5rem;
        }

        .job-card {
            background: var(--surface);
            border-radius: 0.75rem;
            border: 1px solid var(--border);
            overflow: hidden;
            transition: all 0.2s ease;
        }

        .job-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .job-header {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
            background: white;
        }

        .job-title {
            font-size: 1rem;
            font-weight: bold;
            color: #2962ff;
            margin: 0;
        }

        .candidates-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .candidate-item {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        .candidate-item:last-child {
            border-bottom: none;
        }

        .candidate-name {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 0.5rem;
        }

        .candidate-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .meta-item {
            font-size: 0.875rem;
            color: var(--text-light);
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.88rem;
            font-weight: bold;
        }

        .status-pending {
            background: #eff6ff;
            color:#0066FF;
        }

        .status-accepted {
            background: #eff6ff;
            color:#0066FF;
        }

        .status-rejected {
            background: #eff6ff;
            color:#0066FF;
        }

        .cv-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
        }

        .cv-link:hover {
            text-decoration: underline;
        }

        .actions-group {
            display: flex;
            gap: 0.75rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 0.7rem 1rem;
            border-radius: 11rem;
            font-weight: bold;
            font-size: 0.875rem;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
            gap: 0.375rem;
        }

        .btn-warning {
            background: #2962ff;
            color: white;
        }

        .btn-warning:hover {
            background: #0052cc;
        }

        .btn-danger {
            background:rgb(243, 20, 83);
            color: white;
        }

        .btn-danger:hover {
            background:rgb(196, 21, 71);
        }

        .modification-form {
            display: none;
            margin-top: 1rem;
            padding: 1rem;
            background: white;
            border-radius: 0.5rem;
        }

        .file-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid var(--border);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .file-input:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1.5rem;
            color: var(--text-light);
            background: var(--surface);
            border-radius: 0.75rem;
            border: 1px solid var(--border);
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
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
                gap: 3rem;
            }
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
            }

            .candidate-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .actions-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 640px) {
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .page-title {
                font-size: 1.5rem;
            }
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
            
            <a href="{{ route('candidat.toutes.offres') }}" class="{{ request()->routeIs('candidat.toutes.offres') ? 'active' : '' }}">Accueil</a>

            <a href="{{ route('entreprises.index') }}" 
   class="{{ request()->routeIs('entreprises.index') ? 'active' : '' }}">
   Entreprises
</a>

<a href="{{ route('candidat.profil') }}" 
   class="{{ request()->routeIs('candidat.profil') ? 'active' : '' }}">
   Mon Profil
</a>

<a href="{{ route('candidat.candidatures') }}" 
   class="{{ request()->routeIs('candidat.candidatures') ? 'active' : '' }}">
   Mes Candidatures
</a>

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:black;  font-weight: bold; cursor:pointer; font-size:0.875rem;">
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

    <main class="main-container">
        <h1 class="page-title">Mes Candidatures</h1>

        <div class="applications-grid">
            @forelse ($offres as $offre)
                <div class="job-card">
                    <div class="job-header">
                        <h2 class="job-title">{{ $offre->titre }}</h2>
                    </div>

                    @if ($offre->candidats && $offre->candidats->isNotEmpty())
                        <ul class="candidates-list">
                            @foreach ($offre->candidats as $candidat)
                                <li class="candidate-item">
                                    <div class="candidate-name">{{ $candidat->nom }}</div>
                                    <div class="candidate-meta">
                                        <span class="meta-item" style="font-weight: bold;">
                                            Postulé le {{ \Carbon\Carbon::parse($candidat->pivot->date_postulation)->format('d/m/Y') }}
                                        </span>
                                        <span class="status-badge {{ $candidat->pivot->etat === 'Accepté' ? 'status-accepted' : ($candidat->pivot->etat === 'Refusé' ? 'status-rejected' : 'status-pending') }}">
                                            {{ $candidat->pivot->etat }}
                                        </span>
                                    </div>
                                    
                                    <a href="{{ route('cv.show', ['filename' => $candidat->pivot->cv]) }}" target="_blank" class="cv-link" style=" font-weight: bold;">
                                        Voir le CV
                                    </a>

                                    @if ($candidat->pivot->etat !== 'Accepté' && $candidat->pivot->etat !== 'Refusé')
                                        <div class="actions-group">
                                            <button type="button" class="btn btn-warning" onclick="toggleModificationForm({{ $offre->id }}, {{ $candidat->user_id }})">
                                                Modifier
                                            </button>
                                            <button type="button" class="btn btn-danger" onclick="confirmDeletion({{ $offre->id }}, {{ $candidat->user_id }})">
                                                Supprimer
                                            </button>
                                        </div>

                                        <div id="modification-form-{{ $offre->id }}-{{ $candidat->user_id }}" class="modification-form">
                                            <form action="{{ route('candidatures.update', ['offreId' => $offre->id, 'candidatId' => $candidat->user_id]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
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
                                                <button type="submit" class="btn btn-warning">Mettre à jour le CV</button>
                                            </form>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="empty-state">
                            <p>Aucune candidature pour cette offre.</p>
                        </div>
                    @endif
                </div>
            @empty
                <div class="empty-state">
                    <p>Aucune candidature trouvée.</p>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Pages</h4>
                <ul class="footer-links">
                    <li><a href="#" class="footer-link">Accueil</a></li>
                    <li><a href="#" class="footer-link">À propos</a></li>
                    <li><a href="#" class="footer-link">Contact</a></li>
                    <li><a href="#" class="footer-link">Blog</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Département</h4>
                <ul class="footer-links">
                    <li><a href="#" class="footer-link">Design</a></li>
                    <li><a href="#" class="footer-link">Marketing</a></li>
                    <li><a href="#" class="footer-link">Développement</a></li>
                    <li><a href="#" class="footer-link">Support</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Niveau</h4>
                <ul class="footer-links">
                    <li><a href="#" class="footer-link">Junior</a></li>
                    <li><a href="#" class="footer-link">Senior</a></li>
                    <li><a href="#" class="footer-link">Expert</a></li>
                    <li><a href="#" class="footer-link">Manager</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Localisation</h4>
                <ul class="footer-links">
                    <li><a href="#" class="footer-link">Paris</a></li>
                    <li><a href="#" class="footer-link">Lyon</a></li>
                    <li><a href="#" class="footer-link">Marseille</a></li>
                    <li><a href="#" class="footer-link">Bordeaux</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; {{ date('Y') }} RecrutPro. Tous droits réservés.
        </div>
    </footer>

    <script>
        function toggleModificationForm(offreId, candidatId) {
            const form = document.getElementById(`modification-form-${offreId}-${candidatId}`);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        function confirmDeletion(offreId, candidatId) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette candidature ?')) {
                fetch(`{{ url('candidatures') }}/${offreId}/${candidatId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        alert('Candidature supprimée avec succès');
                        location.reload();
                    } else {
                        alert('Une erreur est survenue');
                    }
                })
                .catch(error => console.error('Erreur:', error));
            }
        }
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