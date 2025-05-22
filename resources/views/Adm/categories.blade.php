<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecrutPro - Gestion des Catégories</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0066FF;
            --primary-light: #E6F0FF;
            --primary-dark: #0052CC;
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
            --text: #1e293b;
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

        .page-header {
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
            background:#0066FF;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .add-category-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.65rem 1rem;
            background-color: var(--primary);
            color: white;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            gap: 0.5rem;
            font-size: 0.9rem
        }

        .add-category-btn:hover {
            background-color: var(--primary-dark);
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 1.5rem;
        }

        .category-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.2s;
            
        }

        .category-card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transform: translateY(-2px);
        }

        .category-header {
            padding: 1.5rem;
            background-color: white;
            border-bottom: 1px solid var(--gray-300);
           
            
        }

        .category-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .category-description {
            color: var(--gray-600);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .category-content {
            padding: 1.5rem;
        }

        .specialties-list {
            list-style: none;
            margin-top: 1rem;
        }

        .specialty-item {
            padding: 1rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            background-color: white;
            transition: all 0.2s;
        }

        .specialty-item:hover {
            border-color: var(--primary);
           
        }

        .specialty-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .specialty-name {
            font-weight: 600;
            color: var(--gray-900);
        }

        .specialty-description {
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        .actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .btn {
           
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            gap: 0.375rem;
            
        }
       
       

        .btn-primary {
            background-color: white;
            color: white;
        }
        .btn-primary-add {
            background-color: #0066FF;
            
            color: white;
        }

        .btn-primary:hover {
            background-color: white;
        }
        .btn-primary-add:hover {
            background-color: #0052CC;
        }

        .btn-danger {
            background-color: WHITE;
            color: #dc2626;
        }

        .btn-danger:hover {
            background-color: white;
        }

        .btn-warning {
            background-color: white;
            color: #0066FF;
        }

        .btn-warning:hover {
            background-color:white;
        }

        .form-group {
            margin-bottom: 1rem;
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

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--gray-700);
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 50;
            padding: 1rem;
            overflow-y: auto;
            backdrop-filter: blur(4px);
        }

        .modal-content {
            background: white;
            border-radius: 1rem;
            max-width: 500px;
            margin: 8.5rem auto;
            padding: 2rem;
            position: relative;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            margin-bottom: 1.5rem;
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
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--gray-400);
            cursor: pointer;
            padding: 0.25rem;
            line-height: 1;
        }

        .close-btn:hover {
            color: var(--gray-600);
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

            .categories-grid {
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
                    <a href="{{ route('admin.utilisateurs') }}" class="nav-link">
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
                    <a href="{{ route('admin.categories') }}" class="nav-link active">
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
        <div class="page-header">
            <h1 class="page-title">Gestion des Catégories & Spécialités</h1>
            <button class="add-category-btn" onclick="openAddCategoryModal()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style=" font-weight: bold;">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Nouvelle Catégorie
            </button>
        </div>

        <div class="categories-grid">
            @foreach ($categories as $categorie)
            <div class="category-card">
    <div class="category-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 class="category-title" id="category-{{ $categorie->id }}-name" style="margin: 0;">
                {{ $categorie->nom }}
            </h2>
            <div class="actions" style="display: flex; gap: 8px;">
                <button class="btn btn-primary" onclick="openEditCategoryModal({{ $categorie->id }})">
                    <!-- Icone Modifier -->
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: #0066FF;">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                </button>
                <form method="POST" action="{{ route('admin.categories.delete', $categorie->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                        <!-- Icone Supprimer -->
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: #dc2626;">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <!-- La description est bien en dessous -->
        <p class="category-description" id="category-{{ $categorie->id }}-description">
            {{ $categorie->description }}
        </p>
    </div>

    <div class="category-content">
        <!-- Spécialités -->
        <h3 class="specialty-section-title">Spécialités</h3>
        <ul class="specialties-list">
            @foreach ($categorie->specialites as $specialite)
            <li class="specialty-item">
                <div class="specialty-header">
                    <span class="specialty-name" id="specialty-{{ $specialite->id }}-name">{{ $specialite->nom }}</span>
                    <div class="actions" style="display: flex; gap: 8px;">
                        <button class="btn btn-warning" onclick="openEditSpecialtyModal({{ $specialite->id }})">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </button>
                        <form method="POST" action="{{ route('admin.specialites.delete', $specialite->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette spécialité ?')">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                <p class="specialty-description" id="specialty-{{ $specialite->id }}-description">{{ $specialite->description }}</p>
            </li>
            @endforeach
        </ul>

        <button class="btn btn-primary-add" onclick="openAddSpecialtyModal({{ $categorie->id }})" style="margin-top: 1rem;  display: inline-flex;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" >
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Ajouter une spécialité
        </button>
    </div>
</div>

            @endforeach
        </div>
    </main>

    <!-- Modals -->
    <div id="addCategoryModal" class="modal">
        <div class="modal-content">
            <button class="close-btn" onclick="closeModal('addCategoryModal')">&times;</button>
            <div class="modal-header">
                <h2 class="modal-title">Nouvelle Catégorie</h2>
            </div>
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="categoryName">Nom de la catégorie</label>
                    <input type="text" id="categoryName" name="nom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="categoryDescription">Description</label>
                    <textarea id="categoryDescription" name="description" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary-add" style="width: 100%; ">Créer la catégorie</button>
            </form>
        </div>
    </div>

   <!-- Modal de modification de la catégorie -->
<div id="editCategoryModal" class="modal">
    <div class="modal-content">
        <button class="close-btn" onclick="closeModal('editCategoryModal')">&times;</button>
        <div class="modal-header">
            <h2 class="modal-title">Modifier la Catégorie</h2>
        </div>
        <form id="editCategoryForm" method="POST" action="">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label" for="editCategoryName">Nom de la catégorie</label>
                <input type="text" id="editCategoryName" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="editCategoryDescription">Description</label>
                <textarea id="editCategoryDescription" name="description" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary-add" style="width: 100%;">Enregistrer les modifications</button>
        </form>
    </div>
</div>


    <div id="addSpecialtyModal" class="modal">
        <div class="modal-content">
            <button class="close-btn" onclick="closeModal('addSpecialtyModal')">&times;</button>
            <div class="modal-header">
                <h2 class="modal-title">Nouvelle Spécialité</h2>
            </div>
            <form method="POST" action="{{ route('admin.specialites.store') }}">
                @csrf
                <input type="hidden" id="specialtyCategoryId" name="categorie_id">
                <div class="form-group">
                    <label class="form-label" for="specialtyName">Nom de la spécialité</label>
                    <input type="text" id="specialtyName" name="nom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="specialtyDescription">Description</label>
                    <textarea id="specialtyDescription" name="description" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary-add" style="width: 100%;">Ajouter la spécialité</button>
            </form>
        </div>
    </div>

   <!-- Modal de modification de la spécialité -->
<div id="editSpecialtyModal" class="modal">
    <div class="modal-content">
        <button class="close-btn" onclick="closeModal('editSpecialtyModal')">&times;</button>
        <div class="modal-header">
            <h2 class="modal-title">Modifier la Spécialité</h2>
        </div>
        <form id="editSpecialtyForm" method="POST" action="">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label" for="editSpecialtyName">Nom de la spécialité</label>
                <input type="text" id="editSpecialtyName" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="editSpecialtyDescription">Description</label>
                <textarea id="editSpecialtyDescription" name="description" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary-add" style="width: 100%;">Enregistrer les modifications</button>
        </form>
    </div>
</div>


    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function openAddCategoryModal() {
            openModal('addCategoryModal');
        }

        function openEditCategoryModal(categoryId) {
            const modal = document.getElementById('editCategoryModal');
            const form = document.getElementById('editCategoryForm');
            form.action = `{{ route('admin.categories.update', '') }}/${categoryId}`; 
            
            const categoryName = document.getElementById(`category-${categoryId}-name`).innerText;
    const categoryDescription = document.getElementById(`category-${categoryId}-description`).innerText;

    // Remplis les champs du formulaire avec les données de la catégorie
    document.getElementById('editCategoryName').value = categoryName;
    document.getElementById('editCategoryDescription').value = categoryDescription;

            openModal('editCategoryModal');
        }

        function openAddSpecialtyModal(categoryId) {
            document.getElementById('specialtyCategoryId').value = categoryId;
            openModal('addSpecialtyModal');
        }

        function openEditSpecialtyModal(specialtyId) {
            const modal = document.getElementById('editSpecialtyModal');
            const form = document.getElementById('editSpecialtyForm');
            form.action = `{{ route('admin.specialites.update', '') }}/${specialtyId}`;
            
            const specialtyName = document.getElementById(`specialty-${specialtyId}-name`).innerText;
    const specialtyDescription = document.getElementById(`specialty-${specialtyId}-description`).innerText;

    // Remplis les champs du formulaire avec les données de la spécialité
    document.getElementById('editSpecialtyName').value = specialtyName;
    document.getElementById('editSpecialtyDescription').value = specialtyDescription;

            openModal('editSpecialtyModal');
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>