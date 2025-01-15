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
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Manage Employees</h4>
                <div>
                    <button class="btn btn-danger" id="deleteSelected">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                        <i class="fas fa-plus"></i> Add New Employee
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
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
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
                                <td>
                                    <button class="btn btn-sm btn-warning edit-btn" data-id="{{ $employee->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $employee->id }}">
                                        <i class="fas fa-trash"></i>
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
    <div class="modal fade" id="addEmployeeModal" tabindex="-1">
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
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Employee Modal -->
    <div class="modal fade" id="editEmployeeModal" tabindex="-1">
        <!-- Similar structure to Add Modal with form action for update -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select All functionality
            document.getElementById('selectAll').addEventListener('change', function() {
                document.querySelectorAll('.employee-checkbox').forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });

            // Delete Selected
            document.getElementById('deleteSelected').addEventListener('click', function() {
                if(confirm('Are you sure you want to delete selected employees?')) {
                    const selected = Array.from(document.querySelectorAll('.employee-checkbox:checked'))
                        .map(checkbox => checkbox.value);
                    
                    if(selected.length > 0) {
                        fetch('{{ route("employees.destroy", "") }}/' + selected.join(','), {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }).then(() => window.location.reload());
                    }
                }
            });
        });
    </script>
</body>
</html>