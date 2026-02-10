  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      document.querySelectorAll('.delete-btn').forEach(button => {
          button.addEventListener('click', function() {
              let form = this.closest('.delete-form');

              Swal.fire({
                  title: 'Are you sure?',
                  text: "This campaign category will be deleted permanently!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#10b981',
                  cancelButtonColor: '#ef4444',
                  confirmButtonText: 'Yes, delete it!',
                  cancelButtonText: 'Cancel'
              }).then((result) => {
                  if (result.isConfirmed) {
                      form.submit();
                  }
              });
          });
      });
  </script>
