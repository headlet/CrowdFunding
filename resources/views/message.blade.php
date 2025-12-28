


        @if($errors->any())
            @foreach($errors->all() as $error)
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: "{{ $error }}",
                    showConfirmButton: true,
                    timer: 5000,
                    timerProgressBar: true,
                    showCloseButton: true,
                    customClass: {
                        popup: 'shadow-lg rounded-xl'
                    }
                });
                </script>
            @endforeach
        @endif

        @if(session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: true,
                timer: 4000,
                timerProgressBar: true,
                showCloseButton: true,
                customClass: {
                    popup: 'shadow-lg rounded-xl'
                }
            });
            </script>
        @endif

