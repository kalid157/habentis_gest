<!DOCTYPE html>
<html>
<head>
    <title>Voir les Détails de l'Employé</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
 <!--   <h1>Détails de l'Employé</h1>
    <div>
        <strong>Nom:</strong> {{ $apprenant->name }}
    </div>
    <div>
        <strong>Email:</strong> {{ $apprenant->email }}
    </div>
    <div>
        <strong>Adresse:</strong> {{ $apprenant->address }}
    </div>
    <div>
        <strong>Téléphone:</strong> {{ $apprenant->phone }}
    </div>
    <div>
        <strong>Session:</strong> {{ $apprenant->session }}
    </div>
    <div>
        <strong>Montant:</strong> {{ $apprenant->montant }}
    </div> -->
    <a href="{{ route('apprenants.index') }}">Retour</a>
     <!-- Edit Modal -->
     <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="editName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="editEmail" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="editAddress" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="editPhone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fonction</label>
                            <input type="text" class="form-control" name="fonction" id="editFonction" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" name="status" id="editStatus" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
