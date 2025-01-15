
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  </head>
  <body>
  <div class="container">
      <h1>Sessions</h1>
      <ul class="list-group">
          @foreach($groupDev as $session => $records)
              <li class="list-group-item">
                  <a href="{{ route('developpeurs.show', ['session' => $session]) }}">{{ $session }} ({{$records->count()}} entries)</a>
              </li>
          @endforeach
      </ul>
  </div>

  <div class="container-fluid ">
      <div class="row">
        <div class="col-sm"> 
      
        <x-adminlte-small-box title="{{ $totalDesigns }}" text="User Registrations" icon="fas fa-user-plus text-teal"
         
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
                            <th>Surname</th>
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
                        @foreach($designs as $design)
                        <tr>
                            <td><input type="checkbox" class="employee-checkbox" value="{{ $design->id }}"></td>
                            <td>{{ $design->name }}</td>
                            <td>{{ $design->surname }}</td>
                            <td>{{ $design->email }}</td>
                            <td>{{ $design->address }}</td>
                            <td>{{ $design->phone }}</td>
                            <td>{{ $design->formation }}</td>
                            <td>{{ $design->session }}</td>
                            <td>{{ $design->montant }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning edit-btn" 
                                    data-id="{{ $design->id }}"
                                    data-name="{{ $design->name }}"
                                    data-surname="{{ $design->surname }}"
                                    data-email="{{ $design->email }}"
                                    data-address="{{ $design->address }}"
                                    data-phone="{{ $design->phone }}"
                                    data-formation="{{ $design->formation }}"
                                    data-session="{{ $design->session }}"
                                    data-montant="{{ $design->montant }}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal">
                                    <i class="fas fa-edit"> Edit</i>
                                </button>
                                <form action="{{ route('designs.destroy', $design->id) }}" method="POST" class="d-inline">
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
                <form action="{{ route('designs.store') }}" method="POST">
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
                            <input type="text" class="form-control" name="phone" required>
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
                            <input type="text" class="form-control" name="montant" id="editMontant" required>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </html>
 