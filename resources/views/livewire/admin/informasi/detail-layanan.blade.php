<?php

use Carbon\Carbon;

?>
<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-body">
                    <p>Detail Transaksi</p>
                        <div class="table-responsive">
                            <table class="table border text-nowrap text-md-nowrap mb-0">
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Harga</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Ambil</th>
                                        <th>Status Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)                                      
                                    <tr>
                                        
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->transaksi->konsumen->nama ?? '' }}</td>
                                        <td>{{ $data->transaksi->keterangan ?? '' }}</td>
                                        <td>Rp.{{ number_format($data->total_bayar ?? '') }}</td>
                                        <td>{{ Carbon::parse($data->transaksi->tanggal_diterima ?? '')->locale('id_ID')->isoFormat('Do MMMM YYYY [| Jam ] h:mm a') }}</td>
                                        <td>{{ $data->transaksi->tanggal_diambil ?? '' }}</td>
                                        <td>{{ $data->transaksi->status_bayar ?? '' }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>TOTAL</td>
                                        <td></td>
                                        <td>Rp.{{ number_format($total) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-lg">
                                    {{-- <li class="page-item active">{{ $datas->links('pagination::bootstrap-4') }}</li> --}}
                                </ul>
                            </nav>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
