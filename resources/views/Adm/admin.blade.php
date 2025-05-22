<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecrutPro - Administration</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #0052cc;
            --primary-light: #EEF2FF;
            --secondary: #0066FF;
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
            background-color: var(--gray-50);
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
            color:#0066FF;
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
            color:#0066FF;
        }

        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background-color: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .stat-title {
            color: var(--gray-500);
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 1.875rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
        }

        .stat-change {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.875rem;
        }

        .stat-change.positive {
            color:#0066FF;
            font-weight: 600;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-card {
            background-color: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .chart-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-900);
        }

        .pending-offers {
            background-color: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .offers-list {
            margin-top: 1rem;
        }

        .offer-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .offer-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .offer-company-logo {
            width: 40px;
            height: 40px;
            border-radius: 0.5rem;
            object-fit: cover;
        }

        .offer-details h4 {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
        }

        .offer-details p {
            font-size: 0.75rem;
            color: var(--gray-500);
        }

        .offer-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }

        .btn-success {
            background-color: #0066FF;
            color: white;
        }

        .btn-success:hover {
            background-color:#0052cc;
        }

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background-color: #DC2626;
        }

        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                padding: 0;
                overflow: hidden;
            }

            .main-content {
                margin-left: 0;
            }

            .stats-grid {
                grid-template-columns: 1fr;
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
                    <a href="{{ route('Adm.admin') }}" class="nav-link active">
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
                    <a href="{{ route('Adm.offres') }}" class="nav-link">
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
                    <a href="{{ route('profile') }}" class="nav-link">
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

    <main class="main-content">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-title">Offres d'emploi</div>
                <div class="stat-value">{{ $totalOffres }}</div>
                <div class="stat-change positive">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                    +12% ce mois
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Candidatures</div>
                <div class="stat-value">{{ $totalCandidatures }}</div>
                <div class="stat-change positive">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                    +8% ce mois
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Recruteurs</div>
                <div class="stat-value">{{ $totalRecruteurs }}</div>
                <div class="stat-change positive">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                    +15% ce mois
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Candidats</div>
                <div class="stat-value">{{ $totalCandidats }}</div>
                <div class="stat-change positive">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                    +20% ce mois
                </div>
            </div>
        </div>

        <div class="charts-grid">
            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">Évolution des candidatures</h3>
                </div>
                <canvas id="applicationsChart"></canvas>
            </div>
            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">Offres par semaine</h3>
                </div>
                <canvas id="offersChart"></canvas>
            </div>
        </div>

        <div class="pending-offers">
            <div class="chart-header">
                <h3 class="chart-title">Offres en attente d'approbation</h3>
            </div>
            <div class="offers-list">
                @foreach($pendingOffers as $offer)
                <div class="offer-item">
                    <div class="offer-info">
                        <img src="{{ asset('http://localhost/my-pfaRecrutement/public/storage/' . $offer->recruteur->logo) }}" alt="Logo entreprise" class="offer-company-logo">
                        <div class="offer-details">
                            <h4>{{ $offer->title }}</h4>
                            <p>{{ $offer->company_name }} • {{ $offer->location }}</p>
                        </div>
                    </div>
                    <div class="offer-actions">
                   
                        
                        <form action="{{ route('detail.offre', $offer->id) }}" method="get" style="display:inline;">
                         @csrf
                        <button type="submit" class="btn btn-success">Détail</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <script>
        // Configuration du graphique des candidatures
        const applicationsCtx = document.getElementById('applicationsChart').getContext('2d');
        new Chart(applicationsCtx, {
            type: 'line',
            data: {
                labels: @json($applicationsPerWeek).map(item => 'Semaine ' + item.week_in_month),
                datasets: [{
                    label: 'Candidatures',
                    data: @json($applicationsPerWeek).map(week => week.application_count),
                    borderColor: ' #0066FF',
                    backgroundColor: 'rgba(79, 70, 229, 0.099)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
        });

        // Configuration du graphique des offres
        const offersCtx = document.getElementById('offersChart').getContext('2d');
        new Chart(offersCtx, {
            type: 'bar',
            data: {
                labels: @json($offersPerWeek).map(item => 'Semaine ' + item.week_in_month),
                datasets: [{
                    label: 'Offres',
                    data: @json($offersPerWeek).map(week => week.offer_count),
                    backgroundColor: '#0066FF',
                    borderRadius: 6
                }]
            },
            options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
        });
    </script>
</body>
</html>