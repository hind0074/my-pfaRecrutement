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
        :root {
            --primary: #4F46E5;
            --primary-light: #EEF2FF;
            --secondary: #6366F1;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --gray-900: #111827;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: white;
            color: var(--gray-800);
            min-height: 100vh;
            display: flex;
        }
      

        .sidebar {
            width: 280px;
            background-color: white;
            border-right: 1px solid var(--gray-200);
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            margin-bottom: 2rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0066FF;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .nav-item {
            border-radius: 0.5rem;
            transition: all 0.2s;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            color: var(--gray-600);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-link:hover {
            background-color: var(--gray-50);
            color: #0066FF;
        }

        .nav-link.active {
            background-color: var(--primary-light);
            color: #0066FF;
        }

        .container {
            max-width: 100%;
            margin: 0.5rem ;
            padding: 0 2rem;
            display: block;
            grid-template-columns: 1fr 300px;
            gap: 2rem;
        }

        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
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
            color: #0052cc;
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
            margin-top: -1.2rem;
            margin-left: 1rem;
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

         .btn-success {
            background-color:  #0066FF;
            color: white;
        }

        .btn-success:hover {
            background: #0052cc;
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
   
<aside class="sidebar">
        <div class="logo">
            <span class="logo-text">RecrutPro</span>
        </div>
        <nav>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="Admi.admin" class="nav-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                        Tableau de bord
                    </a>
                </li>
                <li class="nav-item">
                    <a  href="{{ route('admin.utilisateurs') }}" class="nav-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        Utilisateurs
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Adm.offres') }}"  class="nav-link active">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        </svg>
                        Offres
                    </a>
                </li>
                <li class="nav-item">
    <a  href="{{ route('admin.categories') }}" class="nav-link">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
            <polyline points="14 2 14 8 20 8"></polyline>
            <line x1="16" y1="13" x2="8" y2="13"></line>
            <line x1="16" y1="17" x2="8" y2="17"></line>
            <polyline points="10 9 9 9 8 9"></polyline>
        </svg>
        Catégories
    </a>
</li>

<li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="7" r="4"></circle>
        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
    </svg>
    Mon Profil 
                    </a>
                </li>
                <li class="nav-item">
    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
        @csrf
        <button type="submit" class="nav-link" style="background: none; border: none; padding: 0; display: flex; align-items: center; gap: 10px;  color: var(--gray-600);; font: inherit; cursor: pointer; margin-top:9px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left :12px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
            </svg>
            Déconnexion
        </button>
    </form>
</li>
            </ul>
        </nav>
    </aside>


    <div class="container">
        <div class="main-content">
            
            <a href="{{ route('Adm.offres') }}" class="back-button">
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

            <div class="action-buttons">
            <form action="{{ route('offres.approve', $offre->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('POST')
    <button type="submit" class="btn btn-success" onclick="return confirm('Es-tu sûr de vouloir approuver cette offre ?');">
        Approuver
    </button>
</form>


<form action="{{ route('offres.refuse', $offre->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('POST')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Es-tu sûr de vouloir refuser cette offre ?');">
        Refuser
    </button>
</form>


       

        
    </div>


    <script>
function confirmerApprobation(offreId) {
    if (confirm('Es-tu sûr de vouloir approuver cette offre ?')) {
        // Si l'utilisateur confirme, on envoie la requête
        fetch('/offres/' + offreId + '/approuver', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Important pour Laravel
            }
        })
        .then(response => {
            if (response.ok) {
                alert('Offre approuvée avec succès !');
                window.location.href ="{{ route('Adm.offres') }}";
            } else {
                alert('Erreur lors de l\'approbation.');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Erreur réseau.');
        });
    }
}
</script>


</body>
</html>