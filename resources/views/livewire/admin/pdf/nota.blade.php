<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="pdf_assets/css/style.css">
    <title>Nota {{ $data->konsumen->nama }}</title>
</head>

<body>
    <div class="ticket">
        <img src="data:image/png;base64, {{ base64_encode(QrCode::size(100)->generate('http://127.0.0.1:8000/detail/'.$data->id)) }} ">
        <p class="centered"><b>{{ $data->konsumen->nama }}</b>
        <table>
            <thead>
                <tr>
                    <th class="quantity text-center">#</th>
                    <th class="description">Layanan</th>
                    <th class="price">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->listtransaksi as $transaksi)
                <tr>
                    <td class="quantity text-center">{{ $loop->iteration }}</td>
                    <td class="description">
                        {{ $transaksi->layanan->nama }}
                        <br>
                        *berat/jumlah: {{ $transaksi->berat ?? '' }}
                    </td>
                    <td class="price">Rp.{{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
                </tr>
                @endforeach
                <tr>
                    <td class="quantity"></td>
                    <td class="description">TOTAL</td>
                    <td class="price">Rp.{{ number_format($data->total_bayar, 0, ',','.') }}</td>
                </tr>
            </tbody>
        </table>
        <p class="centered">Thanks for your purchase!
            <br>Rumah Laundry</p>
    </div>
</body>

</html>
