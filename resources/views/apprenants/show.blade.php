<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'apprenant</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container">
         <h1>Détails de l'apprenant</h1>

        <div class="mb-3">
            <strong>Nom:</strong> {{ $apprenant->nom }}
        </div>
        <div class="mb-3">
            <strong>Prénom:</strong> {{ $apprenant->prenom }}
        </div>
        <div class="mb-3">
            <strong>Email:</strong> {{ $apprenant->email }}
        </div>
        <div class="mb-3">
            <strong>Date de naissance:</strong> {{ $apprenant->date_de_naissance }}
        </div>

        <a href="{{ route('apprenants.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</body>
</html>