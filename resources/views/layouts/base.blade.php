<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Jobs4Devs | {{ $title }}</title>
</head>

<body>

    <div class="container mt-3 bg-light">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>           
    </div>

</body>

</html>