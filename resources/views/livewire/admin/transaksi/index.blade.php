<?php

use Carbon\Carbon;

?>
<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center mb-3">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Transaksi <span
                            class="badge bg-soft-dark text-dark ms-2">Rp.{{ number_format($total_semua) }}</span>
                    </h1>

                    <div class="mt-2">
                        <a class="text-body me-3" href="#" wire:click="exportPDF()">
                            <i class="bi-download me-1"></i> Export
                        </a>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="{{ route('admin.transaksi.create') }}">Add Transaksi</a>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header card-header-content-md-between">
                <div class="mb-2 mb-md-0">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input wire:model="search" id="datatableSearch" type="search" class="form-control"
                                placeholder="Cari Transaksi" aria-label="Cari Transaksi">
                        </div>
                        <!-- End Search -->
                    </form>
                </div>
                <!-- Dropdown -->
                <div class="dropdown">
                    <button type="button" class="btn btn-white w-100" id="showHideDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false" data-bs-auto-close="outside">
                        <i class="bi-table me-1"></i> Filter <span
                            class="badge bg-soft-dark text-dark rounded-circle ms-1"></span>
                    </button>

                    <div wire:ignore.self class="dropdown-menu dropdown-menu-end dropdown-card" aria-labelledby="showHideDropdown"
                        style="width: 15rem;">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="d-grid gap-3">
                                    <span class="dropdown-header">Filter Tanggal Transaksi</span>

                                    <!-- Form Switch -->
                                    <label class="row form-check form-switch" for="toggleColumn_type">
                                        <input wire:model="from" type="date" class="form-control"
                                        placeholder="Pilih Tanggal Masuk">
                                    </label>
                                    <!-- End Form Switch -->

                                    <!-- Form Switch -->
                                    <label class="row form-check form-switch" for="toggleColumn_type">
                                        <input wire:model="to" type="date" class="form-control"
                                        placeholder="Pilih Tanggal Masuk">
                                    </label>
                                    <!-- End Form Switch -->

                                    <span class="dropdown-header">Filter Pengambilan</span>

                                    <!-- Form Switch -->
                                    <label class="row form-check form-switch" for="toggleColumn_product">
                                        <select class="form-select" wire:model="status_ambil"
                                            aria-label="Default select example" style="position: relative;top: 10px;">
                                            <option selected value="">Pilih Filter</option>
                                            <option value="sudah diambil">Sudah Ambil</option>
                                            <option value="belum diambil">Belum Diambil</option>
                                        </select>
                                    </label>
                                    <!-- End Form Switch -->

                                    <span class="dropdown-header">Filter Pembayaran</span>

                                    <!-- Form Switch -->
                                    <label class="row form-check form-switch" for="toggleColumn_product">
                                        <select class="form-select" wire:model="status_bayar"
                                            aria-label="Default select example" style="position: relative;top: 10px;">
                                            <option selected value="">Pilih Filter</option>
                                            <option value="sudah dibayar">Sudah Dibayar</option>
                                            <option value="belum dibayar">Belum Dibayar</option>
                                            <option value=""></option>
                                        </select>
                                    </label>
                                    <!-- End Form Switch -->

                                    <span class="dropdown-header">Filter Page</span>
                                    <label class="row form-check form-switch" for="toggleColumn_product">
                                        <select class="form-select" wire:model="perPage"
                                            aria-label="Default select example" style="position: relative;top: 10px;">
                                            <option selected value="">Pilih Filter</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="500">500</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Dropdown -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable"
                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="table-column-pe-0">No</th>
                            <th class="table-column-ps-0 text-center">Nama</th>
                            <th>Layanan</th>
                            <th>Keterangan</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Ambil</th>
                            <th>Tanggal Bayar</th>
                            <th>Harga</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($datas as $data)
                        <tr>
                            <td class="table-column-pe-0">
                                {{ $loop->iteration }}.
                            </td>
                            <td>
                                <a href="{{ route('detail',$data->id) }}" class="nama">
                                    {{ $data->konsumen->nama ?? '' }}
                                </a>
                                <br>
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <a href="{{ route('admin.transaksi.edit', $data->id) }}"
                                    class="badge badge-sm bg-primary d-inline-block me-1 mb-1 mt-2"> Edit </a>
                                <a href="#" wire:click="destroy('{{ $data->id }}')"
                                    class="badge badge-sm bg-danger d-inline-block me-1 mb-1 mt-2"> Delete </a>
                                @endif
                                {{-- Print Nota --}}
                                <a href="#" wire:click="printNota('{{ $data->id }}')"
                                    class="badge badge-sm bg-success d-inline-block me-1 mb-1 mt-2"> Print </a>

                            </td>
                            <td>
                                @foreach ($data->listtransaksi as $transaksi)
                                {{ $transaksi->layanan->nama ?? '' }} (berat: {{ $transaksi->berat ?? '' }}) = Rp.
                                {{ $transaksi->total_bayar ?? '' }} <br>
                                @endforeach
                            </td>
                            <td>
                                {{ $data->keterangan }}
                            </td>
                            <td>
                                {{ Carbon::parse($data->tanggal_diterima)->locale('id_ID')->isoFormat('Do MMMM YYYY') }}
                            </td>
                            <td>
                                @if ($data->tanggal_diambil == null)
                                <a href="#" wire:click.prevent='take({{ $data->id }})' data-toggle="tooltip"
                                    data-placement="bottom" title="Ubah Status" style="width: 160px"
                                    class="btn btn-danger d-inline-block me-1 mb-1 mt-1">
                                    {{ $data->status_ambil == 'sudah diambil' ? 'SUDAH AMBIL' : 'BELUM AMBIL' }}
                                </a>
                                @else
                                <span class="btn btn-primary d-inline-block me-1 mb-1 mt-1">
                                {{ Carbon::parse($data->tanggal_diambil)->locale('id_ID')->isoFormat('Do MMMM YYYY') }}
                                </span>
                                @endif
                            </td>
                            <td>
                                @if ($data->tanggal_dibayar == null)
                                <a href="#" wire:click.prevent='paid({{ $data->id }})' data-toggle="tooltip"
                                    data-placement="bottom" title="Pesanan sudah dibayar?" style="width: 160px"
                                    class="btn btn-danger d-inline-block me-1 mb-1 mt-1">
                                    {{ $data->status_bayar == 'belum dibayar' ? 'BELUM BAYAR' : 'SUDAH BAYAR' }}
                                </a>
                                @else
                                <span class="btn btn-success d-inline-block me-1 mb-1 mt-1">
                                    {{ Carbon::parse($data->tanggal_dibayar)->locale('id_ID')->isoFormat('Do MMMM YYYY') }}
                                </span>


                                @endif
                            </td>
                            <td>
                                Rp.{{ number_format($data->total_bayar, 0, ',', '.') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="me-2">Halaman:</span>

                            <!-- Select -->
                            <div class="tom-select-custom">
                                {{ $datas->links() }}
                            </div>
                            <!-- End Select -->
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>
    <style>
        .nama {
            color: #000;
            font-weight: 600;
        }

        .nama:hover {
            color: rgb(4, 130, 247);
            text-decoration: none;
        }
    </style>
</div>

