<?php

use Carbon\Carbon;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

    </style>
</head>

<body>

    <table width="100%">
        <tr>
            <td valign="top"><img src="admin_assets/svg/logos/logo_laundry.png" style="width: 200px" /></td>
            <td align="right">
                <h3>Rumah Laundry</h3>
                <pre>
                Rumah Laundry Indralaya
                Komplek Persada Blok B2 No. 18 Indralaya Ogan Ilir
                Telp. 0896-2892-6599
                Telp. 0838-7676-9457
            </pre>
            </td>
        </tr>

    </table>

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Layanan</th>
                <th>Keterangan</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Ambil</th>
                <th>Tanggal Bayar</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $data->konsumen->nama }}</td>
                <td>
                    @foreach ($data->listtransaksi as $transaksi)
                    {{ $transaksi->layanan->nama ?? '' }} (berat: {{ $transaksi->berat ?? '' }}) = Rp.
                    {{ $transaksi->total_bayar ?? '' }} <br>
                    @endforeach
                </td>
                <td>{{ $data->keterangan }}</td>
                <td>
                    {{ Carbon::parse($data->tanggal_diterima)->locale('id_ID')->isoFormat('Do MMMM YYYY') }}</td>
                <td>
                    @if ($data->tanggal_diambil == null)
                    <span class="btn btn-danger">
                        {{ $data->status_ambil == 'sudah diambil' ? 'SUDAH AMBIL' : 'BELUM AMBIL' }}
                    </span>
                    @else
                    {{ Carbon::parse($data->tanggal_diambil)->locale('id_ID')->isoFormat('Do MMMM YYYY') }}
                    @endif
                </td>
                <td>
                    @if ($data->tanggal_dibayar == null)
                    <span class="btn btn-danger">
                        {{ $data->status_bayar == 'belum dibayar' ? 'BELUM BAYAR' : 'SUDAH BAYAR' }}
                    </span>
                    @else
                    {{ Carbon::parse($data->tanggal_dibayar)->locale('id_ID')->isoFormat('Do MMMM YYYY') }}

                    @endif
                </td>
                <td>Rp.{{ number_format($data->total_bayar, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <br>
        <br>
        <br>
        <tfoot>
            <tr>
                <td colspan="5"></td>
                <td align="right"><b class="text-danger">Total Transaksi</b></td>
                <td align="right">{{ $total_transaksi }}</td>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td align="right"><b class="text-danger">Total Dana</b></td>
                <td align="right" class="gray">Rp.{{ number_format($total_semua) }}</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
