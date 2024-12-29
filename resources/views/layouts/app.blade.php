<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>

    <!-- Include TailwindCSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Bootstrap (Optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body class="bg-gray-100">

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

</body>
</html>
