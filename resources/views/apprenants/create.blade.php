<h1>Add New Apprenant</h1>

<form method="POST" action="{{ route('apprenants.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="formation_id" class="form-label">Formation</label>
        <select class="form-select" id="formation_id" name="formation_id" required>
            @foreach($formations as $formation)
                <option value="{{ $formation->id }}">{{ $formation->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="session" class="form-label">Session</label>
        <input type="text" class="form-control" id="session" name="session" required>
    </div>
    <div class="mb-3">
        <label for="montant" class="form-label">Montant</label>
        <input type="number" class="form-control" id="montant" name="montant" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>