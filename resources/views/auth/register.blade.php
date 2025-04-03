<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
        text-align: center;
        font-size: 1.75rem;
        color: #2962ff;
        }
        h5 {
        text-align: center;
        font-size: 1.75rem;
        color: #2962ff;
        }
        .btn {
    width: 100%;
    padding: 0.75rem;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.95rem;
    text-align: center;
    }
     .btn-primary {
    background-color: #2962ff;
    color: white;
    border: none;
    }
    .btn-primary:hover {
    background-color: #1e88e5;
    }
    .login-form .footer {
    margin-top: 1.5rem;
    text-align: center;
    }
    .form-group {
    margin-bottom: 1.25rem;
    position: relative;
}

.form-group label {
    display: block;
    color: #2962ff;
    margin-bottom: 0.5rem;
    font-weight: 500;
    font-size: 1rem;
}

.form-group input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #e3f2fd;
    border-radius: 8px;
    background: #fff;
    color: #2962ff;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

.form-group input:focus {
    border-color: #2962ff;
    outline: none;
    box-shadow: 0 0 0 3px rgba(41, 98, 255, 0.1);
}

.form-group input::placeholder {
    color: #9fa0a1;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
        <h2>Connexion</h2>
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >Nom</label>
                    <input type="text" name="name" placeholder="Votre nom" required>
                </div>
                <div class="form-group">
                    <label >Email</label>
                    <input type="email" name="email" placeholder="Votre email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" placeholder="Votre mot de passe" required>
                </div>
                <div class="form-group">
                    <label >Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                </div>
                <div class="form-group">
                    <label >Téléphone</label>
                    <input type="text" name="contact_phone" placeholder="Votre téléphone" required>
                </div>

                
                <div class="form-group">
                <label class="form-label">Vous êtes :</label>
                </div>
                    
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="user_type" value="candidat" id="candidatRadio" required>
                        <label class="form-check-label" for="candidatRadio">Candidat</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="user_type" value="recruteur" id="recruteurRadio" required>
                        <label class="form-check-label" for="recruteurRadio">Recruteur</label>
                    </div>
                </div>

                
                <div id="candidatForm" style="display: none;">
                    <h5>Informations du candidat</h5>
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" name="adresse" placeholder="Votre adresse">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Expérience</label>
                        <textarea name="experience" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Compétences</label>
                        <input type="text" name="competences" placeholder="Compétences">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Langues</label>
                        <input type="text" name="langues" placeholder="Langues">
                    </div>
                    <div class="form-group">
                        <label class="form-label">LinkedIn</label>
                        <input type="url" name="linkedin"  placeholder="LinkedIn">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Écoles fréquentées</label>
                      <div id="ecoles-container">
                        <div class="ecole-group">
                            <select name="ecoles[]" class="form-select">
                            <option value="selectionner">selectionner</option>
                              @foreach($ecoles as $ecole)
                              <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                              @endforeach
                         </select>
                         <input type="date" name="dates_debut[]" class="form-control mt-2" placeholder="Date de début">
                         <input type="date" name="dates_fin[]" class="form-control mt-2" placeholder="Date de fin">
                         <input type="text" name="diplomes[]" class="form-control mt-2" placeholder="Diplôme obtenu">
                        </div>
                    </div>
                    <button type="button" id="add-ecole" class="btn btn-secondary mt-2">+ Ajouter une école</button>
                </div>
                </div>
                
                <div id="recruteurForm" style="display: none;">
                    <h5>Informations du recruteur</h5>
                    <div class="form-group">
                        <label class="form-label">Entreprise</label>
                        <input type="text" name="entreprise" placeholder="Entreprise">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Poste</label>
                        <input type="text" name="poste" placeholder="Poste">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description de l'Entreprise</label>
                        <textarea name="descriptionEntreprise" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Localisation</label>
                        <input type="text" name="Localisation" placeholder="Localisation">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Site Web</label>
                        <input type="url" name="website" placeholder="Site Web">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Logo</label>
                        <input type="file" name="logo" placeholder="Logo">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100" >S'inscrire</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const candidatRadio = document.getElementById("candidatRadio");
            const recruteurRadio = document.getElementById("recruteurRadio");
            const candidatForm = document.getElementById("candidatForm");
            const recruteurForm = document.getElementById("recruteurForm");

            candidatRadio.addEventListener("change", function () {
                candidatForm.style.display = "block";
                recruteurForm.style.display = "none";
            });

            recruteurRadio.addEventListener("change", function () {
                recruteurForm.style.display = "block";
                candidatForm.style.display = "none";
            });
        });
    </script>
    
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ecolesData = @json($ecoles);  
        const addEcoleButton = document.getElementById("add-ecole"); 
        const ecolesContainer = document.getElementById("ecoles-container"); 

        
        addEcoleButton.addEventListener("click", function() {
            
            const newEcoleGroup = document.createElement("div");
            newEcoleGroup.classList.add("ecole-group");

            
            const selectEcole = document.createElement("select");
            selectEcole.name = "ecoles[]";
            selectEcole.classList.add("form-select");

            const optionDefault = document.createElement("option");
            optionDefault.value = "selectionner";
            optionDefault.textContent = "Sélectionner";
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
            inputDateDebut.classList.add("form-control", "mt-2");
            inputDateDebut.placeholder = "Date de début";

            const inputDateFin = document.createElement("input");
            inputDateFin.type = "date";
            inputDateFin.name = "dates_fin[]";
            inputDateFin.classList.add("form-control", "mt-2");
            inputDateFin.placeholder = "Date de fin";

            const inputDiplome = document.createElement("input");
            inputDiplome.type = "text";
            inputDiplome.name = "diplomes[]";
            inputDiplome.classList.add("form-control", "mt-2");
            inputDiplome.placeholder = "Diplôme obtenu";

            
            newEcoleGroup.appendChild(selectEcole);
            newEcoleGroup.appendChild(inputDateDebut);
            newEcoleGroup.appendChild(inputDateFin);
            newEcoleGroup.appendChild(inputDiplome);

            
            ecolesContainer.appendChild(newEcoleGroup);
        });
    });
</script>
</body>
</html> 