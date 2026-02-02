<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'إنجاز') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* دعم المناطق الآمنة في الجوال (Notch) */
        .pt-safe {
            padding-top: env(safe-area-inset-top);
        }
        .pb-safe {
            padding-bottom: env(safe-area-inset-bottom);
        }
        /* إخفاء شريط التمرير */
        ::-webkit-scrollbar {
            width: 0px;
            background: transparent;
        }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased selection:bg-sky-100 selection:text-sky-600">
    {{ $slot ?? '' }}
    @yield('content')
</body>
</html>
