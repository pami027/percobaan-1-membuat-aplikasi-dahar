<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan {{ $menu->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Pilih {{ $menu->name }}</h1>
        <form action="{{ route('menus.store') }}" method="POST">
            @csrf
            <input type="hidden" name="menu_id" value="{{ $menu->id }}">

            <div class="mb-3">
                <label for="topping_id" class="form-label">Topping</label>
                <select name="topping_id" id="topping_id" class="form-select" required>
                    <option value="">Pilih Topping</option>
                    @foreach($toppings as $topping)
                        <option value="{{ $topping->id }}">{{ $topping->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="oil_id" class="form-label">Jenis Minyak</label>
                <select name="oil_id" id="oil_id" class="form-select" required>
                    <option value="">Pilih Jenis Minyak</option>
                    @foreach($oils as $oil)
                        <option value="{{ $oil->id }}">{{ $oil->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="spiciness_level_id" class="form-label">Tingkat Kepedasan</label>
                <select name="spiciness_level_id" id="spiciness_level_id" class="form-select" required>
                    <option value="">Pilih Tingkat Kepedasan</option>
                    @foreach($spicinessLevels as $spicinessLevel)
                        <option value="{{ $spicinessLevel->id }}">{{ $spicinessLevel->level }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="portion_id" class="form-label">Porsi</label>
                <select name="portion_id" id="portion_id" class="form-select" required>
                    <option value="">Pilih Porsi</option>
                    @foreach($portions as $portion)
                        <option value="{{ $portion->id }}">{{ $portion->size }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Pesan</button>
        </form>

        @if(session('order'))
            <div class="mt-4">
                <h3>Pesanan Berhasil!</h3>
                <p>Menu: {{ session('order')->menu->name }}</p>
                <p>Topping: {{ session('order')->topping->name }}</p>
                <p>Jenis Minyak: {{ session('order')->oil->name }}</p>
                <p>Tingkat Kepedasan: {{ session('order')->spicinessLevel->level }}</p>
                <p>Porsi: {{ session('order')->portion->size }}</p>
                <p>Total Harga: {{ session('order')->total_price }}</p>
                <p>Scan QR Code untuk menyelesaikan pembayaran:</p>

                <!-- Tampilkan QR Code di sini -->
                <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ urlencode(session('qr_code')) }}&size=200x200" alt="QR Code" id="qrCode">
            </div>

            <script>
                // Fungsi untuk menangani pemindaian QR code
                document.getElementById('qrCode').addEventListener('click', function() {
                    const orderId = {{ session('order')->id }};
                    fetch(`/payment/success/${orderId}`)
                        .then(response => response.json())
                        .then(data => {
                            alert(data.message); // Tampilkan pesan pembayaran berhasil
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            </script>
        @endif
    </div>
</body>
</html>
