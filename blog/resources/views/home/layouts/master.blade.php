<!doctype html>
<html lang="fa" dir="rtl">

<head>
    @include('home.layouts.head-tags')
</head>

<style>
    html, body {
        scroll-behavior: smooth !important;
    }
</style>

<body class="bg-[#ECF0F3] relative">

   @include('home.layouts.header')

   @yield('content')

   @include('home.layouts.footer')

   <div id="overlay"></div>

   @include('home.layouts.scripts')

</body>
</html>
