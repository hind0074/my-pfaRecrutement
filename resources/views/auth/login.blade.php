<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            color: #343a40;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        .form-container h3 {
            color: #242582;
            margin-bottom: 20px;
        }
        .form-control {
            background: #f1f1f1;
            color: #495057;
            border: 1px solid #ced4da;
        }
        .form-control::placeholder {
            color: #6c757d;
        }
        .btn-primary {
            background: #242582;
            border: none;
        }
        .btn-primary:hover {
            background: #553D67;
        }
        a {
            color: #242582;
        }
        a:hover {
            color: #553D67;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3 class="text-center">Connexion</h3>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="Votre email">
            </div>
            <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" required placeholder="Votre mot de passe">
            </div>
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            <p class="text-center mt-3">
                Pas encore de compte ? <a href="{{ route('register') }}">Inscrivez-vous</a>
            </p>
        </form>
    </div>
</body>
</html>
