<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Clubs')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('student.master_app.css')
</head>

<body>
    <!-- Start Top Nav -->
    @include('student.master_app.top')
    <!-- Close Top Nav -->


    <!-- Header -->
    @include('student.master_app.menu')
    <!-- Close Header -->

    <!-- Modal -->
    @include('student.master_app.search')

    @yield('content')

    <!-- Start Footer -->
    @include('student.master_app.footer')
    <!-- End Footer -->

    <!-- Start Script -->
    @include('student.master_app.js')
    <!-- End Script -->
</body>

</html>