<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Employés</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Liste des Employés</h1>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif
    <a href="{{ route('apprenants.create') }}">Ajouter un Employé</a>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Session</th>
                <th>Montant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apprenants as $apprenant)
                <tr>
                    <td>{{ $apprenant->name }}</td>
                    <td>{{ $apprenant->email }}</td>
                    <td>{{ $apprenant->address }}</td>
                    <td>{{ $apprenant->phone }}</td>
                    <td>{{ $apprenant->session }}</td>
                    <td>{{ $apprenant->montant }}</td>
                    <td class="actions">
                        <a href="{{ route('apprenants.show', $apprenant->id) }}">Voir</a>
                        <a href="{{ route('apprenants.edit', $apprenant->id) }}">Modifier</a>
                        <form action="{{ route('apprenants.destroy', $apprenant->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
