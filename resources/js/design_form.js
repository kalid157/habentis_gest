document.getElementById('addEmployeeForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const form = document.getElementById('addEmployeeForm');
    const formData = new FormData(form);
     fetch('/api/designs', {
       method: 'POST',
       body: formData,
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
     .then(response => {
          if (!response.ok) {
                return response.json().then(errorData => {
                console.error('Erreur lors de la requete: ', errorData);
                throw new Error('Erreur de la requête : ' + JSON.stringify(errorData));
          });
 
      }
      return response.json();
      })
     .then(data => {
         console.log(data.message);
          document.getElementById('employee-count-element').textContent = data.employeeCount;
           // Facultativement, faire autre chose en cas de succès (par exemple, afficher un message)
            console.log(data.design );
             alert(data.message);
              form.reset();
       })
       .catch(error => {
          console.error('Erreur :', error);
           alert('Erreur lors de l’ajout de l’employé : ' + error.message);
       });
   });

    // Edit functionality
    document.querySelectorAll('.edit-btn').forEach(button => {
      button.addEventListener('click', function() {
          const id = this.dataset.id;
          const form = document.getElementById('editForm');
          form.action = `/designs/${id}`;
          
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
          alert('Please select designs to delete');
          return;
      }

      if (confirm('Are you sure you want to delete selected designs?')) {
          const form = document.createElement('form');
          form.method = 'POST';
          form.action = '{{ route("designs.destroy", ":id") }}'.replace(':id', selectedIds.join(','));
          form.innerHTML = `
              @csrf
              @method('DELETE')
              <input type="hidden" name="ids" value="${selectedIds.join(',')}">
          `;
          document.body.appendChild(form);
          form.submit();
      }
  });