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
                form.action = `/designs/${id}`;
                
                document.getElementById('editName').value = this.dataset.name;
                document.getElementById('editSurname').value = this.dataset.surname;
                document.getElementById('editEmail').value = this.dataset.email;
                document.getElementById('editAddress').value = this.dataset.address;
                document.getElementById('editPhone').value = this.dataset.phone;
                document.getElementById('editFormation').value = this.dataset.formation;
                document.getElementById('editSession').value = this.dataset.session;
                document.getElementById('editTranche1').value = this.dataset.tranche1;
                document.getElementById('editTranche2').value = this.dataset.tranche2;
                document.getElementById('editTranche3').value = this.dataset.tranche3;
                document.getElementById('editTranche4').value = this.dataset.tranche4;
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