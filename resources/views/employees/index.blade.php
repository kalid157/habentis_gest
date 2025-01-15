<!DOCTYPE html>
<html>
<head>
    <title>Manage Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

    <div class="container-fluid ">
      <div class="row">
        <div class="col-sm"> 
      
        <x-adminlte-small-box title="{{ $employeeCount }}" text="User Registrations" icon="fas fa-user-plus text-teal"
         
            theme="primary" url="#" url-text="View all users"/>

        </div>

        <div class="col-sm">
        <x-adminlte-small-box title="424" text="Views" icon="fas fa-eye text-dark"
        theme="teal" url="#" url-text="View details"/>
        </div>

        <div class="col-sm">
        <x-adminlte-small-box title="0" text="Reputation" icon="fas fa-medal text-dark"
        theme="navy" url="#" url-text="Reputation history" id="sbUpdatable"/>
        </div>
        
      </div>
    </div> 
    
    <div class="container-fluid">
        <div class="card">

            <x-header data="LE STAFF"/>
            
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Fonction</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td><input type="checkbox" class="employee-checkbox" value="{{ $employee->id }}"></td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->fonction }}</td>
                            <td>{{ $employee->status }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning edit-btn" 
                                    data-id="{{ $employee->id }}"
                                    data-name="{{ $employee->name }}"
                                    data-email="{{ $employee->email }}"
                                    data-address="{{ $employee->address }}"
                                    data-phone="{{ $employee->phone }}"
                                    data-fonction="{{ $employee->fonction }}"
                                    data-status="{{ $employee->status }}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal">
                                    <i class="fas fa-edit"> Edit</i>
                                </button>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <!-- Add Modal -->
     <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
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
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fonction</label>
                            <input type="text" class="form-control" name="fonction" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" name="status" required>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Edit functionality
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const form = document.getElementById('editForm');
                form.action = `/employees/${id}`;
                
                document.getElementById('editName').value = this.dataset.name;
                document.getElementById('editEmail').value = this.dataset.email;
                document.getElementById('editAddress').value = this.dataset.address;
                document.getElementById('editPhone').value = this.dataset.phone;
                document.getElementById('editFonction').value = this.dataset.fonction;
                document.getElementById('editStatus').value = this.dataset.status;
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
                alert('Please select employees to delete');
                return;
            }

            if (confirm('Are you sure you want to delete selected employees?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("employees.destroy", ":id") }}'.replace(':id', selectedIds.join(','));
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

        <!--<script src="{{ asset('js/employee_form.js') }}"></script> -->
     
</body>
</html>