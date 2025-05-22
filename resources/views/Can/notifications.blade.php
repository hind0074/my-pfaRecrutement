<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RecrutPro - Centre de Notifications</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #1d4ed8;
            --success: #059669;
            --success-light: #d1fae5;
            --success-border: #6ee7b7;
            --danger: #dc2626;
            --danger-light: #fee2e2;
            --danger-border: #fca5a5;
            --background: #f8fafc;
            --surface: #ffffff;
            --text: #1e293b;
            --text-light: #64748b;
            --border: #e2e8f0;
            --light-blue: #f8f9ff;
            --gray-200: #e5e7eb;
            
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
            color: #0066FF;
            font-weight: bold;
        }
        .logo {
         
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
    background-color: #0066FF;
    color: white;
    border-color: #0066FF;
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
            max-width: 1000px;
            margin: 3rem auto;
            padding: 0 1.5rem;
        }

        .notifications-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text);
            margin: 0  ;
            letter-spacing: -0.025em;
            background: linear-gradient(135deg, #0066FF 0%, #66B2FF 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .notifications-container {
            display: grid;
            gap: 1rem;
        }

        .notification {
            background: var(--surface);
            border-radius: 1rem;
            padding: 1.5rem;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .notification::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            transition: all 0.3s ease;
        }

        .notification:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .notification.success {
            background: var(--success-light);
            border: 1px solid var(--success-border);
        }

        .notification.success::before {
            background: var(--success);
        }

        .notification.error {
            background: var(--danger-light);
            border: 1px solid var(--danger-border);
        }

        .notification.error::before {
            background: var(--danger);
        }

        .notification-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
        }

        .notification.success .notification-icon {
            background: var(--success);
            color: white;
        }

        .notification.error .notification-icon {
            background: var(--danger);
            color: white;
        }

        .notification-content {
            flex: 1;
        }

      

        .notification.success .notification-title {
            color: var(--success);
        }

        .notification.error .notification-title {
            color: var(--danger);
        }

      

        .notification-time {
            font-size: 0.75rem;
            color: var(--text-light);
            margin-top: 0.5rem;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--surface);
            border-radius: 1rem;
            border: 2px dashed var(--border);
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--text-light);
        }

        .empty-state-text {
            color: var(--text-light);
            font-size: 1rem;
            margin: 0;
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
            color: #6b7280;
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




        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(1rem);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .notification {
            animation: slideIn 0.5s ease-out forwards;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .container {
                padding: 0 1rem;
                margin: 2rem auto;
            }

            .page-title {
                font-size: 1.75rem;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        @media (max-width: 640px) {
            .notification {
                padding: 1.25rem;
            }

            .notification-icon {
                width: 2rem;
                height: 2rem;
                font-size: 1rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
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

.notifications-header-nav{
    padding: 1rem 1.5rem;
    border-bottom: 1px solid var(--gray-200);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.notifications-title{
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
    <div class="notifications-header-nav">
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
        <div class="notifications-header">
            <h1 class="page-title">Centre de Notifications</h1>
        </div>

        <div class="notifications-container">
            @if($entretiens->isEmpty() && $candidaturesRefusees->isEmpty())
                <div class="empty-state">
                    <div class="empty-state-icon">📬</div>
                    <p class="empty-state-text">Aucune notification pour le moment</p>
                </div>
            @else
                @foreach($entretiens as $entretien)
                    <div class="notification success">
                        <div class="notification-icon">✓</div>
                        <div class="notification-content">
                            <div class="notification-title">Entretien Confirmé</div>
                            <div class="notification-message">
                                Félicitations ! Vous avez été sélectionné(e) pour un entretien concernant le poste <strong>{{ $entretien->offre->titre }}</strong>. 
                                Consultez votre email pour les détails de l'entretien.
                            </div>
                            <div class="notification-time">
                                {{ \Carbon\Carbon::parse($entretien->created_at)->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach($candidaturesRefusees as $candidature)
                    <div class="notification error">
                        <div class="notification-icon">×</div>
                        <div class="notification-content">
                            <div class="notification-title">Candidature Non Retenue</div>
                            <div class="notification-message">
                                Votre candidature pour le poste <strong>{{ $candidature->offre->titre }}</strong> n'a malheureusement pas été retenue.
                                Nous vous encourageons à postuler à d'autres offres correspondant à votre profil.
                            </div>
                            <div class="notification-time">
                                {{ \Carbon\Carbon::parse($candidature->updated_at)->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                @endforeach
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