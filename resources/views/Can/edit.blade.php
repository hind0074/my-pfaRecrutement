<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RecrutPro - Modifier mon profil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --primary: #4F46E5;
            --primary-dark: #4338CA;
            --secondary: #10B981;
            --secondary-dark: #059669;
            --danger: #EF4444;
            --danger-dark: #DC2626;
            --background: #F9FAFB;
            --white: #FFFFFF;
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

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--background);
            color: var(--gray-800);
            margin: 0;
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
            color: #0066FF;
        }
        .nav-links a.active {
    color: #0066FF !important;
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
    background-color: #0066FF;
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
            max-width: 1280px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .page-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: var(--gray-600);
            font-size: 1.125rem;
        }

        .edit-form {
            background: var(--white);
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .form-header {
            background: var(--gray-50);
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .form-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-900);
            margin: 0;
        }

        .form-content {
            padding: 2rem;
        }

        .form-section {
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .form-section:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 600;
            color: #0066FF;
            margin-bottom: 1.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 90%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: var(--gray-800);
            background: var(--white);
            transition: all 0.2s;
        }

        textarea.form-control{
            width: 90%;
            height: 13%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: var(--gray-800);
            background: var(--white);
            transition: all 0.2s;
        }
        select.form-control{
            width: 102%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: var(--gray-800);
            background: var(--white);
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--gray-400);
        }

        .ecoles-section {
            background: white;
            border-radius: 0.75rem;
            padding: 1rem;
        }

        .ecole-group {
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            align-items: end;
            transition: all 0.2s;
        }

        .ecole-group:hover {
            border-color: var(--primary);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            gap: 0.5rem;
        }

        .btn-primary {
            background: #0066FF;
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--gray-700);
            border: 1px solid var(--gray-300);
            text-decoration: none;
        }

        .btn-secondary:hover {
            background: var(--gray-50);
            border-color: var(--gray-400);
        }

        .btn-danger {
            background: var(--danger);
            color: var(--white);
        }

        .btn-danger:hover {
            background: var(--danger-dark);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-200);
        }

        .footer {
            background: var(--white);
            border-top: 1px solid var(--gray-200);
            padding: 4rem 2rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1280px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 4rem;
        }

        .footer-section h4 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray-900);
            margin: 0 0 1rem;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-section li {
            margin-bottom: 0.75rem;
        }

        .footer-section a {
            color: var(--gray-600);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .footer-section a:hover {
            color: var(--primary);
        }

        .copyright {
            text-align: center;
            padding: 2rem 0 0;
            color: var(--gray-500);
            font-size: 0.875rem;
            border-top: 1px solid var(--gray-200);
            margin-top: 2rem;
        }

        @media (max-width: 1024px) {
            .form-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .ecole-group {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        @media (max-width: 640px) {
            .nav-links {
                display: none;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }
        .file-input-wrapper {
    position: relative;
    display: inline-block;
}

.file-input-button {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 15px;
    background-color:white;
    border: 1px solid #ccc;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.2s ease;
    font-size: 14px;
}

.file-input-button:hover {
    background-color:white;
}

.file-name {
    font-weight: 500;
    color: #333;
}

    </style>
</head>
<body>
<nav class="navbar">
        <div class="logo">
            <span>RecrutPro</span>
        </div>
        <div class="nav-links">
            
            <a href="{{ route('candidat.toutes.offres') }}" 
   class="{{ request()->routeIs('candidat.toutes.offres') ? 'active' : '' }}">
   Accueil
</a>

            <a href="{{ route('entreprises.index') }}" 
   class="{{ request()->routeIs('entreprises.index') ? 'active' : '' }}">
   Entreprises
</a>

<a href="{{ route('candidat.profil') }}" class='active'>Mon Profil</a>

<a href="{{ route('candidatures.candidat') }}" 
   class="{{ request()->routeIs('candidatures.candidat') ? 'active' : '' }}">
   Mes Candidatures
</a>

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
        <div class="page-header">
            <h1 class="page-title">Modifier mon profil</h1>
            <p class="page-subtitle">Mettez à jour vos informations personnelles et professionnelles</p>
        </div>

        <div class="edit-form">
            <form action="{{ route('candidat.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-content">
                    <div class="form-section">
                        <h3 class="section-title">Informations personnelles</h3>
                        <div class="form-grid">
                            <div class="form-group">
                            <label class="form-label">Photo de profil</label>

    <input type="file" name="photo_profil" id="photo_profil" accept="image/*" hidden>
    <label for="photo_profil" class="file-input-button">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
            <polyline points="17 8 12 3 7 8"/>
            <line x1="12" y1="3" x2="12" y2="15"/>
        </svg>
        <span class="file-name" id="photo_profil_name">Choisir une photo</span>
    </label>


                            </div>

                            <div class="form-group">
                                <label class="form-label" for="name">Nom complet</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="contact_phone">Téléphone</label>
                                <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $user->contact_phone) }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="adresse">Adresse</label>
                                <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse', $user->candidat->adresse) }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="linkedin">LinkedIn</label>
                                <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $user->candidat->linkedin) }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">Compétences et expérience</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="competences">Compétences</label>
                                <input type="text" class="form-control" id="competences" name="competences" value="{{ old('competences', $user->candidat->competences) }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="langues">Langues</label>
                                <input type="text" class="form-control" id="langues" name="langues" value="{{ old('langues', $user->candidat->langues) }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="experience">Expérience</label>
                                <textarea class="form-control" id="experience" name="experience" rows="3">{{ old('experience', $user->candidat->experience) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">Formation</h3>
                        <div class="ecoles-section">
                            <div id="ecoles-container">
                                @foreach($ecolesActuelles as $ecole)
                                <div class="ecole-group">
                                    <select name="ecoles[]" class="form-control">
                                        <option value="selectionner">Sélectionner une école</option>
                                        @foreach($ecoles as $ecoleOption)
                                        <option value="{{ $ecoleOption->id }}" {{ $ecole->id == $ecoleOption->id ? 'selected' : '' }}>
                                            {{ $ecoleOption->nom }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <input type="date" name="dates_debut[]" class="form-control" value="{{ $ecole->pivot->date_debut }}">
                                    <input type="date" name="dates_fin[]" class="form-control" value="{{ $ecole->pivot->date_fin }}">
                                    <input type="text" name="diplomes[]" class="form-control" placeholder="Diplôme obtenu" value="{{ $ecole->pivot->diplome }}">
                                    <button type="button" class="btn btn-danger" onclick="removeEcole(this)">Supprimer</button>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-ecole" class="btn btn-secondary">
                                + Ajouter une école
                            </button>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('candidat.profil') }}" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </div>
                </div>
            </form>
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
        document.addEventListener("DOMContentLoaded", function () {
            const ecolesData = @json($ecoles);
            const addEcoleButton = document.getElementById("add-ecole");
            const ecolesContainer = document.getElementById("ecoles-container");

            window.removeEcole = function(button) {
                if (confirm("Êtes-vous sûr de vouloir supprimer cette école ?")) {
                    const ecoleGroup = button.closest('.ecole-group');
                    ecoleGroup.remove();
                }
            };

            addEcoleButton.addEventListener("click", function() {
                const newEcoleGroup = document.createElement("div");
                newEcoleGroup.classList.add("ecole-group");

                const selectEcole = document.createElement("select");
                selectEcole.name = "ecoles[]";
                selectEcole.classList.add("form-control");

                const optionDefault = document.createElement("option");
                optionDefault.value = "selectionner";
                optionDefault.textContent = "Sélectionner une école";
                selectEcole.appendChild(optionDefault);

                ecolesData.forEach(function(ecole) {
                    const option = document.createElement("option");
                    option.value = ecole.id;
                    option.textContent = ecole.nom;
                    selectEcole.appendChild(option);
                });

                const inputDateDebut = document.createElement("input");
                inputDateDebut.type = "date";
                inputDateDebut.name = "dates_debut[]";
                inputDateDebut.classList.add("form-control");
                inputDateDebut.placeholder = "Date de début";

                const inputDateFin = document.createElement("input");
                inputDateFin.type = "date";
                inputDateFin.name = "dates_fin[]";
                inputDateFin.classList.add("form-control");
                inputDateFin.placeholder = "Date de fin";

                const inputDiplome = document.createElement("input");
                inputDiplome.type = "text";
                inputDiplome.name = "diplomes[]";
                inputDiplome.classList.add("form-control");
                inputDiplome.placeholder = "Diplôme obtenu";

                const removeButton = document.createElement("button");
                removeButton.type = "button";
                removeButton.classList.add("btn", "btn-danger");
                removeButton.textContent = "Supprimer";
                removeButton.onclick = function() {
                    removeEcole(this);
                };

                newEcoleGroup.appendChild(selectEcole);
                newEcoleGroup.appendChild(inputDateDebut);
                newEcoleGroup.appendChild(inputDateFin);
                newEcoleGroup.appendChild(inputDiplome);
                newEcoleGroup.appendChild(removeButton);

                ecolesContainer.appendChild(newEcoleGroup);
            });
        });
    </script>
    <script>
    document.getElementById('photo_profil').addEventListener('change', function(){
        const fileName = this.files[0] ? this.files[0].name : 'Choisir une photo';
        document.getElementById('photo_profil_name').textContent = fileName;
    });
</script>

</body>
</html>