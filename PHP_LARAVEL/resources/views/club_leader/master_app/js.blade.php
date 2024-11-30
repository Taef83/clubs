    <!-- BEGIN VENDOR JS-->
    <script src="{{url('control/theme-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{url('control/theme-assets/vendors/js/charts/chartist.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="{{url('control/theme-assets/js/core/app-menu-lite.js')}}" type="text/javascript"></script>
    <script src="{{url('control/theme-assets/js/core/app-lite.js')}}" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{url('control/theme-assets/js/scripts/pages/dashboard-lite.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <form action="" id="delete-form" method="POST">
        @csrf
        @method('DELETE')
    </form>
    @yield('js')
    <script>
        $('.btn-del').on('click', function(e){
            e.preventDefault();
            $('#delete-form').attr('action', '');
            let action = $(this).attr('data-action');
            $('#delete-form').attr('action', action);
            confirmDelete();
        });
    function confirmDelete() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
            console.log(result);

                $('#delete-form').submit();
            }
        })
    }

    </script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500 // Timer in milliseconds (1.5 seconds)
    });
</script>
@endif