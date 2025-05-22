<!DOCTYPE html>
<html>
<head>
    <title>Suppression de votre compte</title>
</head>
<body>
    <h4>Bonjour {{ $user->name }},</h4>

    <p>Nous vous informons que votre compte en tant que {{ $user->role == 'recruteur' ? 'recruteur' : 'candidat' }} a été supprimé pour la raison suivante :</p>

    <blockquote>
        {{ $cause }}
    </blockquote>

    <p>Si vous pensez que c'est une erreur, veuillez nous contacter.</p>

    <p>Cordialement,<br>L'équipe d'administration</p>
</body>
</html>
