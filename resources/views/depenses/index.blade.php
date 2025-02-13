<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Dépenses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Liste des Dépenses par Mois</h1>
          <div class="mb-3">
            <label for="month" class="form-label">Sélectionnez un mois :</label>
              <select class="form-select" id="month" onchange="window.location.href = this.value">
                <option value="{{ route('depenses.index') }}">Tous les mois</option>
                  @foreach ($months as $monthData)
                    <option value="{{ route('depenses.index', ['year' => $monthData->year, 'month' => $monthData->month]) }}"
                        @if ($year == $monthData->year && $month == $monthData->month)
                            selected
                        @endif
                         >
                       {{ date('F Y', mktime(0, 0, 0, $monthData->month, 1, $monthData->year)) }}
                     </option>
                  @endforeach
             </select>
        </div>
        <a href="{{ route('depenses.create') }}" class="btn btn-primary mb-3">Ajouter une dépense</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
          @if($depenses->count() > 0)
            @if($depenses->first() instanceof \App\Models\Depense && $depenses->first() && isset($depenses->first()->date))
                @php
                  $date = \Carbon\Carbon::parse($depenses->first()->date);
                @endphp
                <h2>Dépenses de {{ date('F Y', mktime(0, 0, 0, $date->month, 1, $date->year)) }}</h2>
            @else
               <h2>Dépenses</h2>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Montant</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($depenses as $depense)
                        <tr>
                            <td>{{ $depense->date }}</td>
                            <td>{{ $depense->description }}</td>
                            <td>{{ number_format($depense->montant, 2) }} Fcfa</td>
                            <td>
                       <a href="{{ route('depenses.show', $depense) }}" class="btn btn-sm btn-info">View</a>
                       <a href="{{ route('depenses.edit', $depense) }}" class="btn btn-sm btn-primary">Edit</a>
                       <form action="{{ route('depenses.destroy', $depense) }}" method="POST" style="display: inline;">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                       </form>
                   </td>
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
             <p>Aucune dépense pour ce mois.</p>
         @endif
          <div class="mt-4">
                <p><strong>Total des dépenses :</strong> {{ number_format($totalDepenses, 2) }} Fcfa</p>
            </div>
          {{ $depenses->appends(request()->query())->links() }}
        <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Retour au dashboard</a>
    </div>
</body>
</html>