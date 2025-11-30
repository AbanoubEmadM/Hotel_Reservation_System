<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelMaster — Complete Hotel Management System</title>
    <meta name="description" content="All-in-one hotel software for independent hotels.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
</head>
<body class="font-sans antialiased text-gray-900 bg-white">
@include('partials.navbar')
@yield('content')
<script>
    // Optional: simple scroll animations with Alpine.js (or use Lenis/GSAP if you want)
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.animate-fade-up').forEach((el, i) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.8s ease-out ' + (i * 0.1) + 's';
            el.classList.add('opacity-100', 'translate-y-0');
        });
    });
</script>
</body>
</html>
