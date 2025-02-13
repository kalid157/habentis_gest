<x-head/>
<body>
    
    <div class="container-fluid ">
      <div class="row">
        <div class="col-sm"> 
      
        <x-adminlte-small-box title="{{$dataCount}}" text="User Registrations" icon="fas fa-user-plus text-teal"
         
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
    
    <x-header data="APPRENANTS DATA ANALYST"/>
            
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table  id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority><input type="checkbox" id="selectAll"></th>
                            <th data-priority>Name</th>
                            <th data-priority>Surame</th>
                            <th data-priority>Email</th>
                            <th data-priority>Address</th>
                            <th data-priority>Phone</th>
                            <th data-priority>Formation</th>
                            <th data-priority>Session</th>
                            <th data-priority>Montant</th>
                            <th data-priority>Actions</th>
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
                                <button class="btn btn-sm btn-warning edit-btn" 
                                    data-id="{{ $apprenant->id }}"
                                    data-name="{{ $apprenant->name }}"
                                    data-surname="{{ $apprenant->surname }}"
                                    data-email="{{ $apprenant->email }}"
                                    data-address="{{ $apprenant->address }}"
                                    data-phone="{{ $apprenant->phone }}"
                                    data-formation="{{ $apprenant->formation }}"
                                    data-session="{{ $apprenant->session }}"
                                    data-montant="{{ $apprenant->montant }}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal">
                                   <i class="fas fa-edit"> Edit</i>
                                    
                                </button>
                                <form action="{{ route('apprenants.destroy', $apprenant->id) }}" method="POST" class="d-inline">
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
                            <input type="numeric" class="form-control" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Formation</label>
                            <input type="text" class="form-control" name="formation" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Session</label>
                            <input type="text" class="form-control" name="session" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Montant</label>
                            <input type="number" class="form-control" name="montant" required>
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
                    <h5 class="modal-title">Edit Apprenant</h5>
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
                            <input type="numeric" class="form-control" name="montant" id="editMontant" required>
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
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="/DataTables/datatables.js"></script>
    <!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            responsive: true,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.12.0/i18n/fr-FR.json'
            }
        }).columns.adjust().responsive.recalc();
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Edit functionality
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const form = document.getElementById('editForm');
                form.action = `/apprenants/${id}`;
                
                document.getElementById('editName').value = this.dataset.name;
                document.getElementById('editSurname').value = this.dataset.surname;
                document.getElementById('editEmail').value = this.dataset.email;
                document.getElementById('editAddress').value = this.dataset.address;
                document.getElementById('editPhone').value = this.dataset.phone;
                document.getElementById('editFormation').value = this.dataset.formation;
                document.getElementById('editSession').value = this.dataset.session;
                document.getElementById('editMontant').value = this.dataset.montant;
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

<!--<script src="{{ asset('js/employee_form.js') }}"></script>-->