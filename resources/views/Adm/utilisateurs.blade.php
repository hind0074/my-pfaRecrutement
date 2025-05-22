<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecrutPro - Gestion des Utilisateurs</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0066FF;
            --primary-light: #E6F0FF;
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
            z-index: 40;
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
            color: var(--primary);
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
            color: var(--primary);
        }

        .nav-link.active {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .section-title {
            color: var(--gray-900);
            font-size: 1.25rem;
            font-weight: 600;
        }

        .user-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .user-section {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .user-list {
            list-style: none;
        }

        .user-item {
            padding: 1rem;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .user-item:hover {
            background-color: var(--gray-50);
        }

        .user-item:last-child {
            border-bottom: none;
        }

        .user-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--gray-200);
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
        }

        .user-email {
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            text-decoration: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        .btn-admin {
            padding:0px 0px;
            background-color: white;
            color: #0066FF;
            font-size: 0.875rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }


        .btn-primary:hover {
            background-color: #0052cc;
        }

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 50;
            backdrop-filter: blur(4px);
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            width: 90%;
            max-width: 500px;
            position: relative;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-900);
        }

        .close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
            color: var(--gray-400);
            cursor: pointer;
            transition: color 0.2s;
            border: none;
            background: none;
            padding: 0.25rem;
        }

        .close-btn:hover {
            color: var(--gray-600);
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-success {
            background-color: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .btn-close {
            margin-left: auto;
            cursor: pointer;
            opacity: 0.5;
            transition: opacity 0.2s;
        }

        .btn-close:hover {
            opacity: 1;
        }

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .user-grid {
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
                    <a href="{{ route('Adm.admin') }}" class="nav-link">
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
                    <a href="{{ route('admin.utilisateurs') }}" class="nav-link active">
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
                    <a href="{{ route('admin.categories') }}" class="nav-link">
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
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M4 21v-2a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v2"></path>
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
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="btn-close" onclick="this.parentElement.remove()">×</button>
            </div>
        @endif

        <div class="user-grid">
            <!-- Admins Section -->
            <div class="user-section">
                <div class="section-header" style="padding: 1rem;">
                <h3 class="section-title">Admins</h3>
               

                    <button class="btn-admin" onclick="openAddAdminModal()">
    <!-- Icône SVG -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
        <path d="M16 21v-2a4 4 0 0 0-4-4h-4a4 4 0 0 0-4 4v2"></path>
        <circle cx="12" cy="7" r="4"></circle>
        <path d="M17 11h6M20 8v6"></path>
    </svg>
    
</button>
                </div>
                <ul class="user-list">
                    @foreach($admins as $admin)
                        @php
                            $adminData = [
                                "id" => $admin->id,
                                "nom" => $admin->name,
                                "email" => $admin->email,
                                "photo" => $admin->photo_profil,
                                "telephone" => $admin->contact_phone,
                                "role" => "admin",
                            ];
                        @endphp
                        <li class="user-item" onclick='openUserModal(@json($adminData))'>
                            @php
                                $photo = $admin->photo_profil ? 'http://localhost/my-pfaRecrutement/public/storage/'.$admin->photo_profil : 'http://localhost/my-pfaRecrutement/public/images/imgDef.jpg';
                            @endphp
                            <img src="{{ asset($photo) }}" alt="Photo de profil" class="user-avatar">
                            <div class="user-info">
                                <div class="user-name">{{ $admin->name }}</div>
                                <div class="user-email">{{ $admin->email }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if(!$voirToutAdmins )
                    <div style="padding: 1rem;">
                        <a href="{{ route('admin.utilisateurs', ['voir_tout_admins' => 1]) }}" class="btn btn-primary" style="width: 100%;">
                            Voir tous les admins
                        </a>
                    </div>
                @endif
            </div>

            <!-- Recruteurs Section -->
            <div class="user-section">
                <div class="section-header" style="padding: 1rem;">
                    <h3 class="section-title">Recruteurs</h3>
                </div>
                <ul class="user-list">
                    @foreach($recruteurs as $recruteur)
                        @php
                            $recruteurData = [
                                "id" => $recruteur->user->id,
                                "nom" => $recruteur->user->name,
                                "email" => $recruteur->user->email,
                                "photo" => $recruteur->user->photo_profil,
                                "telephone" => $recruteur->user->contact_phone ?? "Non précisé",
                                "role" => "recruteur",
                                "entreprise" => $recruteur->entreprise,
                                "logo" => $recruteur->logo,
                                "description" => $recruteur->descriptionEntreprise,
                                "localisation" => $recruteur->Localisation,
                                "website" => $recruteur->website,
                            ];
                        @endphp
                        <li class="user-item" onclick='openUserModal(@json($recruteurData))'>
                            @php
                                $photo = $recruteur->user->photo_profil ? 'http://localhost/my-pfaRecrutement/public/storage/'.$recruteur->user->photo_profil : 'http://localhost/my-pfaRecrutement/public/images/imgDef.jpg';
                            @endphp
                            <img src="{{ asset($photo) }}" alt="Photo de profil" class="user-avatar">
                            <div class="user-info">
                                <div class="user-name">{{ $recruteur->user->name }}</div>
                                <div class="user-email">{{ $recruteur->user->email }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if(!$voirToutRecruteurs)
                    <div style="padding: 1rem;">
                        <a href="{{ route('admin.utilisateurs', ['voir_tout_recruteurs' => 1]) }}" class="btn btn-primary" style="width: 100%;">
                            Voir tous les recruteurs
                        </a>
                    </div>
                @endif
            </div>

            <!-- Candidats Section -->
            <div class="user-section">
                <div class="section-header" style="padding: 1rem;">
                    <h3 class="section-title">Candidats</h3>
                </div>
                <ul class="user-list">
                    @foreach($candidats as $candidat)
                        @php
                            $candidatData = [
                                "id" => $candidat->user->id,
                                "nom" => $candidat->user->name,
                                "email" => $candidat->user->email,
                                "photo" => $candidat->user->photo_profil,
                                "telephone" => $candidat->user->contact_phone ?? "Non précisé",
                                "role" => "candidat",
                                "adresse" => $candidat->adresse ?? "Non précisée",
                                "linkedin" => $candidat->linkedin ?? "Non précisé",
                            ];
                        @endphp
                        <li class="user-item" onclick='openUserModal(@json($candidatData))'>
                            @php
                                $photo = $candidat->user->photo_profil ? 'http://localhost/my-pfaRecrutement/public/storage/'.$candidat->user->photo_profil : 'http://localhost/my-pfaRecrutement/public/images/imgDef.jpg';
                            @endphp
                            <img src="{{ asset($photo) }}" alt="Photo de profil" class="user-avatar">
                            <div class="user-info">
                                <div class="user-name">{{ $candidat->user->name }}</div>
                                <div class="user-email">{{ $candidat->user->email }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if(!$voirToutCandidats)
                    <div style="padding: 1rem;">
                        <a href="{{ route('admin.utilisateurs', ['voir_tout_candidats' => 1]) }}" class="btn btn-primary" style="width: 100%;">
                            Voir tous les candidats
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <!-- User Details Modal -->
    <div id="userModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <button class="close-btn" onclick="closeUserModal()">×</button>
            <div class="modal-header">
                <img id="modal-photo" class="user-avatar" style="width: 100px; height: 100px; margin: 0 auto 1rem;" src="" alt="Photo de profil">
                <h4 id="modal-nom" class="modal-title"></h4>
                <p id="modal-email" style="color: var(--gray-500);"></p>
            </div>
            <div id="modal-extra"></div>
            <div id="modal-logo-container" style="display: none; text-align: center; margin-top: 1rem;">
                <img id="modal-logo" src="" alt="Logo de l'entreprise" style="max-width: 150px; height: auto;">
            </div>
            <div id="modal-recruteur-extra"></div>
            
            <div style="margin-top: 1.5rem;">
                <div id="deleteReasonContainer" style="display: none;">
                    <textarea id="deleteReason" class="form-control" placeholder="Entrez la cause de suppression..."></textarea>
                    <button id="confirmDeleteBtn" class="btn btn-danger" style="width: 100%; margin-top: 1rem;">
                        Confirmer la suppression
                    </button>
                </div>
                <button id="deleteUserBtn" class="btn btn-danger" style="width: 100%;">
                    Supprimer cet utilisateur
                </button>
            </div>
        </div>
    </div>

    <!-- Add Admin Modal -->
    <div id="addAdminModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <button class="close-btn" onclick="closeAddAdminModal()">×</button>
            <div class="modal-header">
                <h4 class="modal-title">Ajouter un nouvel Admin</h4>
            </div>
            <form action="{{ route('admin.add') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="adminName">Nom</label>
                    <input type="text" class="form-control" id="adminName" name="name" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="adminEmail">Email</label>
                    <input type="email" class="form-control" id="adminEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="adminPhone">Téléphone</label>
                    <input type="text" class="form-control" id="adminPhone" name="contact_phone" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="adminPassword">Mot de passe</label>
                    <input type="password" class="form-control" id="adminPassword" name="password" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="adminPasswordConfirm">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="adminPasswordConfirm" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Ajouter</button>
            </form>
        </div>
    </div>

    <script>
        function openUserModal(user) {
            document.getElementById('modal-photo').src = user.photo 
                ? `http://localhost/my-pfaRecrutement/public/storage/${user.photo}` 
                : 'http://localhost/my-pfaRecrutement/public/images/imgDef.jpg';
            document.getElementById('modal-nom').innerText = user.nom;
            document.getElementById('modal-email').innerText = user.email;

            let extra = '';
            
            if (user.role === 'admin') {
                extra += `<p><strong>Téléphone :</strong> ${user.telephone}</p>`;
                document.getElementById('modal-logo-container').style.display = 'none';
            }
            if (user.role === 'recruteur') {
                extra += `<p><strong>Téléphone :</strong> ${user.telephone}</p>`;
                extra += `<p><strong>Entreprise :</strong> ${user.entreprise}</p>`;
                extra += `<p><strong>Description de l'entreprise :</strong> ${user.description || "Non précisée"}</p>`;
                extra += `<p><strong>Localisation :</strong> ${user.localisation || "Non précisée"}</p>`;
                extra += `<p><strong>Site web :</strong> <a href="${user.website}" target="_blank">${user.website || "Non précisé"}</a></p>`;
                if (user.logo) {
                    document.getElementById('modal-logo').src = `http://localhost/my-pfaRecrutement/public/storage/${user.logo}`;
                    document.getElementById('modal-logo-container').style.display = 'none';
                } else {
                    document.getElementById('modal-logo-container').style.display = 'none';
                }
            }

            if (user.role === 'candidat') {
                extra += `<p><strong>Téléphone :</strong> ${user.telephone}</p>`;
                extra += `<p><strong>Adresse :</strong> ${user.adresse || "Non précisée"}</p>`;
                extra += `<p><strong>LinkedIn :</strong> <a href="${user.linkedin}" target="_blank">${user.linkedin || "Non précisé"}</a></p>`;
                document.getElementById('modal-logo-container').style.display = 'none';
            }

            document.getElementById('modal-extra').innerHTML = extra;
            document.getElementById('userModal').style.display = 'flex';
            document.getElementById('userModal').setAttribute('data-user-id', user.id);

            const deleteBtn = document.getElementById('deleteUserBtn');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            const deleteReasonContainer = document.getElementById('deleteReasonContainer');

            deleteBtn.onclick = function() {
                deleteReasonContainer.style.display = 'block';
                deleteBtn.style.display = 'none';
            };

            confirmDeleteBtn.onclick = function() {
                const reason = document.getElementById('deleteReason').value.trim();
                if (!reason) {
                    alert('Merci de préciser la cause de la suppression.');
                    return;
                }

                if (confirm('Es-tu sûr de vouloir supprimer cet utilisateur ?')) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `{{ url('admin/utilisateurs') }}/${user.id}/supprimer`;

                    const token = document.createElement('input');
                    token.type = 'hidden';
                    token.name = '_token';
                    token.value = `{{ csrf_token() }}`;

                    const causeInput = document.createElement('input');
                    causeInput.type = 'hidden';
                    causeInput.name = 'cause';
                    causeInput.value = reason;

                    form.appendChild(token);
                    form.appendChild(causeInput);
                    document.body.appendChild(form);
                    form.submit();
                }
            };
        }

        function closeUserModal() {
            document.getElementById('userModal').style.display = 'none';
            document.getElementById('deleteReasonContainer').style.display = 'none';
            document.getElementById('deleteUserBtn').style.display = 'block';
        }

        function openAddAdminModal() {
            document.getElementById('addAdminModal').style.display = 'flex';
        }

        function closeAddAdminModal() {
            document.getElementById('addAdminModal').style.display = 'none';
        }
    </script>
</body>
</html>