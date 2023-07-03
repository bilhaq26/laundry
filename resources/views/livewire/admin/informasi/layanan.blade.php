<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Daftar Layanan</h1>
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
                                placeholder="Search transaksi" aria-label="Search transaksi">
                        </div>
                        <!-- End Search -->
                    </form>
                </div>

                <div class="d-grid d-sm-flex justify-content-md-end align-items-sm-center gap-2">
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom position-relative">
                <table id="datatable"
                    class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0, 7],
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",
                     "pageLength": 15,
                     "isResponsive": false,
                     "isShowPaging": false,
                     "pagination": "datatablePagination"
                   }'>
                    <thead class="thead-light">
                        <tr>
                            <th class="table-column-pe-0">#</th>
                            <th class="table-column-ps-0">Nama Layanan</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah Transaksi</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($datas as $data)
                        <tr>
                            <td class="table-column-pe-0">
                                {{ $loop->iteration }}
                            </td>
                            <td class="table-column-ps-0">
                                <div class="ms-3">
                                    <span class="d-block h5 text-inherit mb-0">
                                        <a href="{{ route('admin.informasi.detail-layanan', $data->id) }}">{{ $data->nama }}<a>
                                    </span>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="d-block h5 mb-0">Rp.{{ number_format($data->harga) }}</span>
                            </td>
                            <td class="text-center">{{ $data->getAllTotalLayanan() }}</td>
                            <td>Rp.{{ number_format($data->getAllTotalLayanan()*$data->harga) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <h5 class="text-muted mt-5">Data tidak ditemukan</h5>
                            </td>
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
                </div>
                <!-- End Row -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>
</div>
