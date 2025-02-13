<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Recettes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Liste des Recettes par Mois</h1>
          <div class="mb-3">
            <label for="month" class="form-label">Sélectionnez un mois :</label>
              <select class="form-select" id="month" onchange="window.location.href = this.value">
                <option value="{{ route('recettes.index') }}">Tous les mois</option>
                 @foreach ($months as $monthData)
                   <option value="{{ route('recettes.index', ['year' => $monthData->year, 'month' => $monthData->month]) }}"
                        @if ($year == $monthData->year && $month == $monthData->month)
                          selected
                       @endif
                      >
                    {{ date('F Y', mktime(0, 0, 0, $monthData->month, 1, $monthData->year)) }}
                    </option>
                 @endforeach
             </select>
        </div>
        <a href="{{ route('recettes.create') }}" class="btn btn-primary mb-3">Ajouter une recette</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
           @if($recettes->count() > 0)
             @if($recettes->first() instanceof \App\Models\Recette && $recettes->first() && isset($recettes->first()->date))
                   @php
                        $date = \Carbon\Carbon::parse($recettes->first()->date);
                     @endphp
                   <h2>Recettes de {{ date('F Y', mktime(0, 0, 0, $date->month, 1, $date->year)) }}</h2>
             @else
                  <h2>Recettes</h2>
              @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recettes as $recette)
                        <tr>
                            <td>{{ $recette->date }}</td>
                            <td>{{ $recette->description }}</td>
                            <td>{{ number_format($recette->montant, 2) }} Fcfa</td>
                        </tr>
                    @endforeach
                </tbody>
                  <tfoot>
                    <tr>
                        <td colspan="2" class="text-end"><strong>Total du mois:</strong></td>
                       <td><strong>{{ number_format($totalParMois, 2) }} Fcfa</strong></td>
                    </tr>
                </tfoot>
            </table>
         @else
              <p>Aucune recette pour ce mois.</p>
        @endif

          <div class="mt-4">
                <p><strong>Total des recettes :</strong> {{ number_format($totalRecettes, 2) }} Fcfa</p>
          </div>
        {{ $recettes->appends(request()->query())->links() }}
         <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Retour au dashboard</a>
    </div>
</body>
</html>