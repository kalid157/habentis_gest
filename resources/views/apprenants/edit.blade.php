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

<script src="{{ asset('js/employee_form.js') }}"></script>