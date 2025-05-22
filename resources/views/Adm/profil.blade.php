<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile - RecrutPro</title>
    <style>
        :root {
            --primary: #0066FF;
            --primary-dark: #0052cc;
            --primary-light: #E8F0FF;
            --success: #10B981;
            --danger: #EF4444;
            --warning: #F59E0B;
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
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--gray-50);
            color: var(--gray-800);
            line-height: 1.5;
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

        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
            max-width: 1200px;
        }

        .profile-container {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .profile-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .profile-cover {
            height: 100px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 1rem;
            border: 4px solid white;
            margin: -60px auto 0;
            display: block;
            object-fit: cover;
        }

        .profile-info {
            padding: 1.5rem;
            text-align: center;
        }

        .profile-name {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .profile-email {
            color: var(--gray-600);
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .profile-phone {
            color: var(--gray-600);
            font-size: 0.875rem;
        }

        .edit-form {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--gray-100);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
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
            padding: 0.75rem 1rem;
            border: 1.5px solid var(--gray-200);
            border-radius: 0.5rem;
            font-size: 0.95rem;
            color: var(--gray-700);
            transition: all 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--primary-light);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-outline {
            background: transparent;
            border: 1.5px solid var(--gray-200);
            color: var(--gray-700);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-light);
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 50;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            width: 100%;
            max-width: 500px;
            position: relative;
            animation: slideUp 0.3s ease-out;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--gray-100);
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-900);
        }

        .modal-close {
            background: none;
            border: none;
            color: var(--gray-500);
            cursor: pointer;
            padding: 0.5rem;
            transition: color 0.2s;
        }

        .modal-close:hover {
            color: var(--gray-900);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 1024px) {
            .profile-container {
                grid-template-columns: 1fr;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
                padding: 1.5rem 0.75rem;
            }

            .logo-text, .nav-link span {
                display: none;
            }

            .main-content {
                margin-left: 80px;
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
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.utilisateurs') }}" class="nav-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>Utilisateurs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Adm.offres') }}" class="nav-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        </svg>
                        <span>Offres</span>
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
                        <span>Catégories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link active">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                        </svg>
                        <span>Mon Profil</span>
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
        <div class="profile-container">
            <div class="profile-card">
                <div class="profile-cover"></div>
                <img src="{{ asset($admin->photo_profil ? 'http://localhost/my-pfaRecrutement/public/storage/' . $admin->photo_profil : 'http://localhost/my-pfaRecrutement/public/images/imgDef.jpg') }}" 
                     alt="Photo de profil" 
                     class="profile-avatar">
                <div class="profile-info">
                    <h1 class="profile-name">{{ $admin->name }}</h1>
                    <p class="profile-email">{{ $admin->email }}</p>
                    <p class="profile-phone">{{ $admin->contact_phone }}</p>
                    <button class="btn btn-outline" style="margin-top: 1rem;" onclick="openPasswordModal()">
                        Changer le mot de passe
                    </button>
                </div>
            </div>

            <div class="edit-form">
                <h2 class="form-title">Modifier mon profil</h2>
                <form action="{{ route('admin.updateProfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label" for="name">Nom complet</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $admin->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Adresse email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $admin->email) }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="contact_phone">Téléphone</label>
                        <input type="tel" class="form-control" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $admin->contact_phone) }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="photo_profil">Photo de profil</label>
                        <input type="file" class="form-control" id="photo_profil" name="photo_profil">
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour le profil</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Modal pour le changement de mot de passe -->
    <div class="modal" id="passwordModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Changer le mot de passe</h3>
                <button class="modal-close" onclick="closePasswordModal()">×</button>
            </div>
            <form action="{{ route('admin.changePassword') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="current_password">Mot de passe actuel</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="new_password">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="new_password_confirmation">Confirmer le nouveau mot de passe</label>
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
            </form>
        </div>
    </div>

    <script>
        function openPasswordModal() {
            document.getElementById('passwordModal').classList.add('active');
        }

        function closePasswordModal() {
            document.getElementById('passwordModal').classList.remove('active');
        }

        // Fermer le modal en cliquant en dehors
        window.onclick = function(event) {
            const modal = document.getElementById('passwordModal');
            if (event.target === modal) {
                closePasswordModal();
            }
        }
    </script>
</body>
</html>