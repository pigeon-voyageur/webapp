<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="robots" content="all" />
    <meta name="target" content="all" />

    <meta name="author" content="Pige" />
    <meta name="owner" content="Pige" />

    <meta name="url" content="https://pige.arthaud.ovh" />
    <meta name="identifier-URL" content="https://pige.arthaud.ovh" />
    <link rel="canonical" href="https://pige.arthaud.ovh" />

    <meta
        name="description"
        content="Prenez du recul sur l'actualité du monde grâce à votre pigeon voyageur."
    />

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-title" content="Pige" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#ffffff" />
    <meta name="theme-color" content="#ffffff" />

    <link
        rel="shortcut icon"
        href="/assets/favicons/favicon.ico"
        type="image/x-icon"
    />
    <link
        rel="apple-touch-icon"
        href="/assets/favicons/apple-touch-icon.png"
    />
    <link
        rel="apple-touch-icon"
        sizes="57x57"
        href="/assets/favicons/apple-touch-icon-57x57.png"
    />
    <link
        rel="apple-touch-icon"
        sizes="72x72"
        href="/assets/favicons/apple-touch-icon-72x72.png"
    />
    <link
        rel="apple-touch-icon"
        sizes="76x76"
        href="/assets/favicons/apple-touch-icon-76x76.png"
    />
    <link
        rel="apple-touch-icon"
        sizes="114x114"
        href="/assets/favicons/apple-touch-icon-114x114.png"
    />
    <link
        rel="apple-touch-icon"
        sizes="120x120"
        href="/assets/favicons/apple-touch-icon-120x120.png"
    />
    <link
        rel="apple-touch-icon"
        sizes="144x144"
        href="/assets/favicons/apple-touch-icon-144x144.png"
    />
    <link
        rel="apple-touch-icon"
        sizes="152x152"
        href="/assets/favicons/apple-touch-icon-152x152.png"
    />
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="/assets/favicons/apple-touch-icon-180x180.png"
    />

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link rel="manifest" href="/manifest.json" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.ts', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead

</head>
<body class="font-sans antialiased">
@inertia
</body>
</html>
