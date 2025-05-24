<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('backend')}}/plugins/bootstrap/css/bootstrap.min.css">
        {{-- toastr --}}
        <link rel="stylesheet" href="{{ asset('backend') }}/plugins/toastr/toastr.min.css">
        {{-- sweetalert 2 --}}
        <link rel="stylesheet" href="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.min.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div>
            @include('layouts.navigation')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        {{-- bootstrap js --}}
        <script src="{{asset('backend')}}/plugins/bootstrap/js/bootstrap.min.js"></script>

        <script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/toastr/toastr.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
        <!-- Delete Confirmation -->
<script>
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        let link = $(this).attr("href");
        Swal.fire({
            title: "Are you sure you want to delete?",
            text: "Once deleted, this will be permanently gone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
            } else {
                Swal.fire("Safe data!");
            }
        });
    });
</script>
<script>
    function confirmDelete(id) {
    Swal.fire({
      title: 'Are you sure to Delete ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('delete-student-' + id).submit();
      }
    });
  }
</script>
<!-- Toastr Notifications -->
<script>
    @if (session('success'))
      toastr.success("{{ session('success') }}");
    @endif
    @if (session('error'))
      toastr.error("{{ session('error') }}");
    @endif
    @if (session('warning'))
      toastr.warning("{{ session('warning') }}");
    @endif
    @if (session('info'))
      toastr.info("{{ session('info') }}");
    @endif
  </script>

    </body>
</html>
