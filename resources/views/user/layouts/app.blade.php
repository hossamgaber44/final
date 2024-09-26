<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="{{ asset('images/final_logo.png') }}">
    <link rel="stylesheet" href="{{ asset('style/css/main.css') }}">
    <title>courses</title>
</head>

<body dir="rtl">
    <main>
        {{-- start nav --}}
        @include('user.include.nav')
        <div style="height: 80px"></div>
        {{-- end nav --}}
        @yield('content')
    </main>

    <script>
        const navLink = document.querySelector(".nav_link");

        function toggleNavbar() {
            navLink.classList.toggle('mobile-menu');
        };
    </script>
</body>

</html>
