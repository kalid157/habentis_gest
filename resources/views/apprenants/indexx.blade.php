<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Apprenants Data-Analyst</h4>
                <div>
                    <button class="btn btn-danger" id="deleteSelected">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="fas fa-plus"></i>  Add New Apprenant
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>Name</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Formation</th>
                                <th>Session</th>
                                <th>Montant</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apprenants as $apprenant)
                            <tr>
                                <td><input type="checkbox" class="employee-checkbox" value="{{ $apprenant->id }}"></td>
                                <td>{{ $apprenant->name }}</td>
                                <td>{{ $apprenant->surname }}</td>
                                <td>{{ $apprenant->email }}</td>
                                <td>{{ $apprenant->address }}</td>
                                <td>{{ $apprenant->phone }}</td>
                                <td>{{ $apprenant->formation }}</td>
                                <td>{{ $apprenant->session }}</td>
                                <td>{{ $apprenant->montant }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning edit-bt"
                                    data-id="{{ $apprenant->id }}"
                                    data-name="{{ $apprenant->name }}"
                                    data-email="{{ $apprenant->surname }}"
                                    data-email="{{ $apprenant->email }}"
                                    data-address="{{ $apprenant->address }}"
                                    data-phone="{{ $apprenant->phone }}"
                                    data-formation="{{ $apprenant->formation }}"
                                    data-session="{{ $apprenant->session }}"
                                    data-montant="{{ $apprenant->montant }}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal">
                                        <i class="fas fa-edit">Edit</i>
                                    </button>
                                    <form action="{{ route('apprenants.destroy', $apprenant->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                    
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Add Employee Modal -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('apprenants.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Surname</label>
                            <input type="text" class="form-control" name="surname" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Formation</label>
                            <input type="text" class="form-control" name="formation" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Session</label>
                            <input type="text" class="form-control" name="formation" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Montant</label>
                            <input type="text" class="form-control" name="montant" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
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
                            <label class="form-label">Surname</label>
                            <input type="text" class="form-control" name="surname" id="editSurname" required>
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
                            <label class="form-label">Formation</label>
                            <input type="text" class="form-control" name="formation" id="editFormation" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Session</label>
                            <input type="text" class="form-control" name="session" id="editSession" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Montant</label>
                            <input type="number" class="form-control" name="montant" id="editMontant" required>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Edit functionality
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const form = document.getElementById('editForm');
                form.action = `/apprenants/${id}`;
                
                document.getElementById('editName').value = this.dataset.name;
                document.getElementById('editEmail').value = this.dataset.email;
                document.getElementById('editAddress').value = this.dataset.address;
                document.getElementById('editPhone').value = this.dataset.phone;
            });
        });

        // Select all functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            document.querySelectorAll('.employee-checkbox').forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Bulk delete
        document.getElementById('deleteSelected').addEventListener('click', function() {
            const selectedIds = Array.from(document.querySelectorAll('.employee-checkbox:checked'))
                .map(checkbox => checkbox.value);
            
            if (selectedIds.length === 0) {
                alert('Please select apprenants to delete');
                return;
            }

            if (confirm('Are you sure you want to delete selected employees?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("apprenants.destroy", ":id") }}'.replace(':id', selectedIds.join(','));
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="ids" value="${selectedIds.join(',')}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    </script>

    
   
        <script src="{{ asset('js/employee_form.js') }}"></script>
     
</body>
</html>