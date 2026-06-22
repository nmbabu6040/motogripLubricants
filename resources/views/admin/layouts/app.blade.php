<!DOCTYPE html>
<html>

<head>

    <title>Motogrip Admin</title>

    @if ($setting && $setting->favicon)
        <link rel="icon" type="image/png" href="{{ asset('storage/settings/' . $setting->favicon) }}">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    @stack('styles')


</head>

<body>

    <div class="container-fluid">

        <div class="row">

            @include('admin.layouts.sidebar')

            <main class="col-md-10 ms-sm-auto px-md-4 py-5">

                @include('admin.layouts.navbar')

                @yield('content')

            </main>

        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

    <script>
        $(document).ready(function() {
            $('textarea').summernote({
                height: 250,
                placeholder: 'Write here...'
            });
        });
    </script>
</body>

</html>
