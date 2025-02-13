<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session: {{ $session }}</title>
</head>
<body>
    <h1>Session: {{ $data['name'] }}</h1>
    <p>Nombre de participants : {{ $data['participants'] }}</p>
    <p>Revenu : {{ $data['revenu'] }}</p>

    <!-- Ajoutez ici le reste de votre contenu spécifique à la session -->
</body>
</html>