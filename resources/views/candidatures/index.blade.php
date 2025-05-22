<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RecrutPro - Tableau de bord</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --primary: #0F172A;
            --secondary: #3B82F6;
            --accent: #8B5CF6;
            --success: #10B981;
            --danger: #EF4444;
            --warning: #F59E0B;
            --background: #F8FAFC;
            --surface: #FFFFFF;
            --text: #0F172A;
            --text-light: #64748B;
            --border: #E2E8F0;
            --gray-500: #6b7280;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--gray-50);
            margin: 0;
            color: var(--gray-700);
            min-height: 100vh;
        }
        .navbar {
            background: white;
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
            color: #0066FF;
            font-weight: 600;
        }


        .post-job-btn {
            background:  #0066FF;
            color: white !important;
            padding: 0.5rem 1rem;
            border-radius: 5rem;
            text-decoration: none;
            font-size: 0.875rem;
            transition: background-color 0.2s;
        }

        .post-job-btn:hover {
            background: #2563EB;
            transform: translateY(-1px);
        }

        .container {
    max-width: 1300px;
    margin: 2rem 0 2rem 2rem; /* haut, droite, bas, gauche */
    padding: 1rem;
}

        .job-card {
            background: var(--surface);
            border-radius: 1rem;
            overflow: hidden;
            margin-bottom: 2rem;
            border: 1px solid var(--border);
            transition: all 0.3s;
        }

        .job-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .job-header {
            background:  white;
            padding: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .job-title {
            font-size: 1rem;
            font-weight: 700;
            color: #0066FF;
            margin: 0;
            letter-spacing: -0.025em;
        }

        .candidates-container {
            padding: 1rem;
        }

        .candidate-card {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s;
            border: 1px solid var(--border);
        }

        .candidate-card:hover {
            background: white;
            border-color: var(--secondary);
        }

        .candidate-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .candidate-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .candidate-avatar {
            width: 3rem;
            height: 3rem;
            /*background: linear-gradient(135deg, var(--secondary), var(--accent));*/
            background:#eff6ff;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.25rem;
        }

        .candidate-name {
            font-weight: 500;
            color: var(--primary);
            font-size: 1rem;
            letter-spacing: -0.025em;
            margin-bottom: 10px;
        }

        .candidate-meta {
            color: var(--text-light);
            font-size: 0.875rem;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.84rem;
            font-weight: 600;
            font-weight: bold;
            letter-spacing: 0.025em;
        }

        .status-pending {
            background: #eff6ff;
            color: #0066FF;
           
        }

        .status-accepted {
            background: #eff6ff;
            color: #0066FF;
        }

        .status-rejected {
            background: #eff6ff;
            color: #0066FF;
           /* background: #FEE2E2;
            color: #991B1B;*/
        }

        .candidate-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 5rem;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-success {
            background:  #0066FF;
            color: white;
        }

        .btn-success:hover {
            background:rgb(0, 4, 255);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #DC2626;
        }

        .cv-link {
            color: var(--secondary);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0;
           
        }

        .cv-link:hover {
            color: #2563EB;
            text-decoration: underline;
        }

        .interview-form {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-top: 1.5rem;
            border: 1px solid  #E2E8F0;
        }

        .form-group {
            margin-bottom: 1.25rem;
            max-width: 97%;
            
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text);
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            transition: all 0.2s;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #0066FF;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        #confirmation-message {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--success);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.3s ease-out;
            font-weight: 500;
        }

        .empty-state {
            text-align: center;
            padding: 2.5rem 0rem;
            color: var(--text-light);
            background: #F8FAFC;
            border-radius: 0.75rem;
            border: 1px dashed var(--border);
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

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }

            .candidate-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }

        @media (max-width: 640px) {
            .candidate-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
            .footer-content {
                grid-template-columns: 1fr;
            }
        }

        .side-panel {
            background: var(--white);
            padding: 1.6rem;
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
.interview-modal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.95);
    background: white;
    border-radius: 16px;
    width: 90%;
    max-width: 500px;
    max-height: 85vh;
    z-index: 9999;
    opacity: 0;
    transition: all 0.3s ease;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  }

  .interview-modal.active {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1;
  }

  .modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    border-bottom: 1px solid  #0066FF;
  }

  .modal-header h2 {
    font-size: 1.25rem;
    font-weight: 600;
    color:  #0066FF;
    margin: 0;
  }

  .close-button {
    background: none;
    border: none;
    color: #6b7280;
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 9999px;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .close-button:hover {
    background-color: #f3f4f6;
    color: #111827;
  }

  .modal-content {
    padding: 1.5rem;
    overflow-y: auto;
    max-height: calc(85vh - 4rem);
  }

  

  .empty-state svg {
    margin-bottom: 1rem;
  }

 
  .interviews-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .interview-item {
    padding: 1rem;
    border-radius: 12px;
    background:rgb(241, 246, 252);
    margin-bottom: 1rem;
    transition: all 0.2s ease;
  }

  .interview-item:hover {
    background: rgb(241, 246, 252);
    transform: translateY(-2px);
  }

  .interview-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.75rem;
  }

  .interview-header h3 {
    font-size: 1rem;
    font-weight: 600;
    color:  #2563eb;
    margin: 0;
  }

  .interview-date {
    font-size: 0.9rem;
    color: #2563eb;
    font-weight: 600;
    background:rgb(241, 246, 252);
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
  }

  .interview-details {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }

  .detail-row {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #4b5563;
    font-size: 0.875rem;
  }

  .detail-row svg {
    flex-shrink: 0;
    color: #6b7280;
  }

  .modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9998;
    backdrop-filter: blur(4px);
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .modal-overlay.active {
    opacity: 1;
  }

  @media (max-width: 640px) {
    .interview-modal {
      width: 95%;
      max-height: 90vh;
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
            <a href="{{ route('candidatures.index') }}" class="active">Candidatures</a>
            <a href="{{ route('recruteur.index') }}" >Mes Offres</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:black; cursor:pointer; font-size:0.875rem; font-weight: bold;">
                    Déconnexion
                </button>
            </form>
            <a href="{{ route('offres.create') }}" class="post-job-btn"  >Annoncer</a>
        </div>
    </nav>

    <div class="container" style="display: flex; align-items: flex-start; gap: 2rem;">
    <div style="flex: 1;">
        @forelse ($offres as $offre)
            <div class="job-card">
                <div class="job-header">
                    <h3 class="job-title">{{ $offre->titre }}</h3>
                </div>

                <div class="candidates-container">
                    @if ($offre->candidats->where('pivot.etat', 'En attente')->isNotEmpty())
                        <div class="candidates-list">
                        @foreach ($offre->candidats->where('pivot.etat', 'En attente') as $candidat)
                                <div class="candidate-card">
                                    <div class="candidate-header">
                                        <div class="candidate-info">
                                            <div class="candidate-avatar" style="color: #0066FF;">
                                                {{ substr($candidat->user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="candidate-name">{{ $candidat->user->name }}</div>
                                                <div class="candidate-meta">
                                                    Postulé le {{ \Carbon\Carbon::parse($candidat->pivot->date_postulation)->format('d/m/Y') }}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <span id="etat-{{ $offre->id }}-{{ $candidat->user_id }}" 
                                              class="status-badge {{ $candidat->pivot->etat === 'Accepté' ? 'status-accepted' : ($candidat->pivot->etat === 'Refusé' ? 'status-rejected' : 'status-pending') }}">
                                            {{ $candidat->pivot->etat }}
                                        </span>
                                    </div>

                                    <a href="{{ route('cv.show', ['filename' => $candidat->pivot->cv]) }}" 
                                       target="_blank" 
                                       class="cv-link">
                                        Voir le CV
                                    </a>
 
                                    <div class="candidate-actions">
                                        <button type="button" 
                                                onclick="updateEtat({{ $offre->id }}, {{ $candidat->user_id }}, 'Accepté')" 
                                                class="btn btn-success">
                                            Accepter
                                        </button>

                                        
                                        <button type="button" 
        onclick="if(confirm('Êtes-vous sûr de vouloir refuser cette candidature ?')) updateEtat({{ $offre->id }}, {{ $candidat->user_id }}, 'Refusé')" 
        class="btn btn-danger">
    Refuser
</button>

                                    </div>

                                    <form action="{{ route('entretiens.store') }}" 
                                          method="POST" 
                                          id="form-entretien-{{ $offre->id }}-{{ $candidat->user_id }}" 
                                          class="interview-form" 
                                          style="display: none;"  onsubmit="return envoyerEntretien(event, {{ $offre->id }}, {{ $candidat->id }})">
                                        @csrf
                                        <input type="hidden" name="offre_id" value="{{ $offre->id }}">
                                        <input type="hidden" name="candidat_id" value="{{ $candidat->user_id }}">
                                        
                                        <div class="form-group">
                                            <label for="date_heure">Date & heure de l'entretien</label>
                                            <input type="datetime-local" name="date_heure" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="message">Message / Lieu / Plateforme</label>
                                            <textarea name="message" rows="3" class="form-control" required></textarea>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success">
                                            Planifier l'entretien
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <p>Aucune candidature pour cette offre.</p>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="empty-state">
                <p>Aucune offre trouvée.</p>
            </div>
        @endforelse
    </div>

    <div style="display: flex; flex-direction: column; gap: 2.2rem;">
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

<div class="side-panel">
        <div class="job-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#10B981">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3>Entretiens à venir</h3>
        <p class="job-desc">Consultez les entretiens que vous avez planifiés.</p>
        <a href="#" onclick="openModal()" class="cta-main" style="background-color: #10B981; font-weight: bold;">
    Voir mes entretiens
</a>


    </div>
</div>
    </div>
  

    <div id="confirmation-message" style="display: none;">
        L'email de confirmation a été envoyé avec succès !
    </div>

    <!-- Modale des entretiens -->
<div id="modalEntretiens" class="interview-modal">
  <div class="modal-header">
    <h2>Mes entretiens à venir</h2>
    <button onclick="closeModal()" class="close-button">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M18 6L6 18M6 6l12 12"/>
      </svg>
    </button>
  </div>

  <div class="modal-content">
    @if($entretiens->isEmpty())
      <div class="empty-state">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
          <line x1="16" y1="2" x2="16" y2="6"/>
          <line x1="8" y1="2" x2="8" y2="6"/>
          <line x1="3" y1="10" x2="21" y2="10"/>
        </svg>
        <p>Aucun entretien à venir</p>
      </div>
    @else
      <ul class="interviews-list">
        @foreach ($entretiens as $entretien)
          <li class="interview-item">
            <div class="interview-header">
              <h3>{{ $entretien->candidat->user->name ?? 'Candidat' }}</h3>
              <span class="interview-date">
                {{ \Carbon\Carbon::parse($entretien->date_heure)->format('d/m/Y H:i') }}
              </span>
            </div>
            <div class="interview-details">
              <div class="detail-row">
              <svg xmlns="http://www.w3.org/2000/svg" 
     width="20" 
     height="20" 
     fill="none" 
     viewBox="0 0 24 24" 
     stroke="#2563eb" 
     stroke-width="2" 
     stroke-linecap="round" 
     stroke-linejoin="round">
  <rect x="3" y="4" width="18" height="16" rx="2" ry="2" />
  <line x1="7" y1="8" x2="17" y2="8" />
  <line x1="7" y1="12" x2="17" y2="12" />
  <line x1="7" y1="16" x2="13" y2="16" />
</svg>

                <span>{{ $entretien->offre->titre ?? 'Offre' }}</span>
              </div>
              <div class="detail-row">
              <svg xmlns="http://www.w3.org/2000/svg" 
     width="20" 
     height="20" 
     fill="none" 
     viewBox="0 0 24 24" 
     stroke="#2563eb" 
     stroke-width="2" 
     stroke-linecap="round" 
     stroke-linejoin="round">
  <circle cx="12" cy="12" r="10" />
  <line x1="12" y1="16" x2="12" y2="12" />
  <line x1="12" y1="8" x2="12.01" y2="8" />
</svg>

                <span>{{ $entretien->message }}</span>
              </div>
            </div>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</div>

<!-- Overlay sombre derrière la modale -->
<div id="overlay" onclick="closeModal()" class="modal-overlay"></div>


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

    @if(session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

   
<script>
    function updateEtat(offreId, candidatId, etat) {
        const formId = `form-entretien-${offreId}-${candidatId}`;
        const form = document.getElementById(formId);

        // Afficher le formulaire d'entretien uniquement si l'état est "Accepté"
        if (etat === 'Accepté') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none'; // Masquer le formulaire si l'état est "Refusé"
        }

        // Créer un objet FormData pour envoyer les données via AJAX
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('etat', etat);

        // Utiliser fetch pour envoyer la requête AJAX
        fetch(`{{ route('candidatures.updateEtat', ['offre' => '__offre_id__', 'candidat' => '__candidat_id__']) }}`.replace('__offre_id__', offreId).replace('__candidat_id__', candidatId), {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Mettre à jour dynamiquement l'état dans la vue
                document.getElementById(`etat-${offreId}-${candidatId}`).innerText = etat;
                console.log('Candidature mise à jour avec succès');
            } else {
                alert('Une erreur s\'est produite lors de la mise à jour de l\'état.');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
    }

    
</script>
<script>
     function openModal() {
    const modal = document.getElementById('modalEntretiens');
    const overlay = document.getElementById('overlay');
    
    modal.style.display = 'block';
    overlay.style.display = 'block';
    
    // Force reflow
    modal.offsetHeight;
    
    modal.classList.add('active');
    overlay.classList.add('active');
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    const modal = document.getElementById('modalEntretiens');
    const overlay = document.getElementById('overlay');
    
    modal.classList.remove('active');
    overlay.classList.remove('active');
    
    setTimeout(() => {
      modal.style.display = 'none';
      overlay.style.display = 'none';
      
      // Restore body scroll
      document.body.style.overflow = '';
    }, 300);
  }
</script>

 </body>
</html>