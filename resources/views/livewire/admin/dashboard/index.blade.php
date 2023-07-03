<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Ref\Pengunjung;
use App\Models\Dat\Information;
use App\Models\Dat\Transaksi;


?>
<div>
    @push('page_title')
    Dashboard
    @endpush

    <div class="content container-fluid">

        <!-- Stats -->
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Transaksi Hari Ini</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">{{ $transaksihari }}</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart">
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-success text-success">
                            <i class="bi-graph-up"></i>
                        </span>
                        <span class="text-body fs-6 ms-1">sudah dibayar
                            <b>Rp.{{number_format($pendapatanharian) }}</b></span>
                        <span class="text-body fs-6 ms-1">dari
                            <b>Rp.{{number_format($hasilharian) }}</b></span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Transaksi Minggu Ini</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">{{ $transaksimingguan }}</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart">
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-success text-success">
                            <i class="bi-graph-up"></i>
                        </span>
                        <span class="text-body fs-6 ms-1">sudah dibayar
                            <b>Rp.{{number_format($pendapatanmingguan) }}</b></span>
                        <span class="text-body fs-6 ms-1">dari
                            <b>Rp.{{number_format($hasilmingguan) }}</b></span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Transaksi Bulan Ini</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">{{ $transaksibulan }}</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart">
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-success text-success">
                            <i class="bi-graph-up"></i>
                        </span>
                        <span class="text-body fs-6 ms-1">sudah dibayar
                            <b>Rp.{{number_format($pendapatanbulan) }}</b></span>
                        <span class="text-body fs-6 ms-1">dari
                            <b>Rp.{{number_format($hasilbulanan) }}</b></span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Transaksi Tahunan</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">{{ $transaksitahun }}</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart">
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-secondary text-body"></span>
                        <span class="text-body fs-6 ms-1">sudah dibayar
                            <b>Rp.{{number_format($pendapatantahunan) }}</b></span>
                        <span class="text-body fs-6 ms-1">dari
                            <b>Rp.{{number_format($hasiltahunan) }}</b></span>
                    </div>
                </a>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Stats -->

        <div class="row">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-sm-between">
                        <h4 class="card-header-title mb-2 mb-sm-0">Transactions</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Chart -->

                        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
                            <livewire:livewire-column-chart key="{{ $columnChartModel->reactiveKey() }}"
                                :column-chart-model="$columnChartModel" />
                        </div>
                        <!-- End Chart -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-6">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Laporan Penghasilan</h4>

                        <!-- Dropdown -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle"
                                id="reportsOverviewDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-three-dots-vertical"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end mt-1"
                                aria-labelledby="reportsOverviewDropdown1">
                                <span class="dropdown-header">Settings</span>

                                <a class="dropdown-item" href="#">
                                    <i class="bi-share-fill dropdown-item-icon"></i> Share reports
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-download dropdown-item-icon"></i> Download
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-alt dropdown-item-icon"></i> Connect other apps
                                </a>

                                <div class="dropdown-divider"></div>

                                <span class="dropdown-header">Feedback</span>

                                <a class="dropdown-item" href="#">
                                    <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                </a>
                            </div>
                        </div>
                        <!-- End Dropdown -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <span class="h1 d-block mb-4">Rp.{{number_format($pendapatan) }}</span>

                        <!-- Progress -->
                        <div class="progress rounded-pill mb-2">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Gross value"></div>
                            <div class="progress-bar opacity-50" role="progressbar" style="width: 33%"
                                aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Net volume from sales"></div>
                            <div class="progress-bar opacity-25" role="progressbar" style="width: 9%" aria-valuenow="9"
                                aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="New volume from sales"></div>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <span>0%</span>
                            <span>100%</span>
                        </div>
                        <!-- End Progress -->

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-lg table-nowrap card-table mb-0">
                                @forelse ($transaksiterakhir as $data)
                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator bg-primary"></span>{{ $data->konsumen->nama }}
                                    </th>
                                    <td>Rp.{{number_format($data->totalbayar) }}</td>
                                    <td>
                                        @if ($data->status_bayar == 'belum bayar')
                                        <span class="badge bg-danger">Belum Bayar</span>
                                        @elseif($data->status_bayar == 'sudah bayar')
                                        <span class="badge bg-success">Sudah Bayar</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
</div>
