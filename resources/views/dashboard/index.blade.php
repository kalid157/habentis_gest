
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <h1>Dashboard</h1>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-light text-dark">
                    <div class="card-body">
                        <h5 class="card-title">Total des Dépenses</h5>
                         <p class="card-text"> {{ number_format($totalDepenses, 2) }} FCFA</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light text-dark">
                     <div class="card-body">
                         <h5 class="card-title">Total des Recettes</h5>
                         <p class="card-text">{{ number_format($totalRecettes, 2) }} FCFA</p>
                     </div>
                 </div>
            </div>
            <div class="col-md-4">
                 <div class="card bg-success text-white">
                      <div class="card-body">
                           <h5 class="card-title">Situation de la Caisse</h5>
                            <p class="card-text">{{ number_format($solde, 2) }} FCFA</p>
                       </div>
                  </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                         <h5 class="card-title">Dépenses</h5>
                         <p class="card-text">Gérer vos dépenses mensuelles.</p>
                         <a href="{{ route('depenses.index') }}" class="btn btn-primary">Voir les dépenses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                       <h5 class="card-title">Recettes</h5>
                       <p class="card-text">Gérer vos recettes mensuelles.</p>
                       <a href="{{ route('recettes.index') }}" class="btn btn-primary">Voir les recettes</a>
                   </div>
                </div>
           </div>
        </div>
    </div>
</body>
</html>