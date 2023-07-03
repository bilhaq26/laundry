<?php

use Carbon\Carbon;

?>
<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-body">
                    <p><a href="{{ route('admin.transaksi.index') }}">Kembali</a></p>
                    <div class="input-group">
                        <input type="text" wire:model="search" class="form-control" placeholder="Cari Transaksi">
                        <div class="input-group-prepend" style="cursor:pointer">
                        </div>
                    </div>
                        <div class="table-responsive">
                            <table class="table border text-nowrap text-md-nowrap mb-0">
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Layanan</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Status Ambil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->konsumen->nama }}</td>
                                            <td>
                                                @foreach ($data->listtransaksi as $transaksi)
                                                {{ $transaksi->layanan->nama ?? '' }} (berat: {{ $transaksi->berat }}) = Rp.
                                                {{ $transaksi->total_bayar }} <br>
                                                @endforeach
                                            </td>
                                            <td>{{ Carbon::parse($data->tanggal_diterima)->locale('id_ID')->isoFormat('Do MMMM YYYY [| Jam ] h:mm a') }}</td>
                                            <td>{{ Carbon::parse($data->tanggal_dibayar)->locale('id_ID')->isoFormat('Do MMMM YYYY [| Jam ] h:mm a') }}</td>
                                            <td>
                                                @if ($data->status_ambil == 'sudah diambil')
                                                    <span class="btn btn-success">
                                                        <i class="fa fa-check-circle text-success"></i>
                                                        Sudah Diambil
                                                    </span>
                                                @else
                                                    <span class="btn btn-danger">
                                                        <i class="fa fa-check-circle text-danger"></i>
                                                        Belum Diambil
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>Data Kosong</tr>
                                    @endforelse
                                    <tr>
                                        <td>TOTAL</td>
                                        <td></td>
                                        <td>Rp.{{ number_format($total) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{ $datas->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
