<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Menu</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Pilih Menu</h1>
        @foreach($menus as $menu)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $menu->name }}</h5>
                    <a href="{{ route('menus.show', $menu->id) }}" class="btn btn-primary">Pesan</a>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
