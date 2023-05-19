<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carservice</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="hidden md:block">
                            <div class="flex items-baseline">
                                <h1 class="text-white font-bold">Flexinform Kft. - Felvételi feladat</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-full px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Carservice</h1>
            </div>
        </header>
        <main id="app">
            @vite('resources/js/app.js')
        </main>
    </div>
</body>

</html>