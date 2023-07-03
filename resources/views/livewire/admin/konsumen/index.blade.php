<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Daftar Pelanggan</h1>
                </div>
                <!-- End Col -->
                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="{{ route('admin.konsumen.create') }}">
                      <i class="bi-person-plus-fill me-1"></i> + Tambah Pelanggan
                    </a>
                  </div>
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
                            <th class="table-column-ps-0">Nama Pelanggan</th>
                            <th class="text-center">
                                <i class="bi bi-gear-wide-connected"></i>
                            </th>
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
                                       {{ $data->nama }}
                                    </span>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.konsumen.edit', $data->id) }}"
                                    class="btn btn-info btn-action mr-1" data-toggle="tooltip" title=""
                                    data-original-title="Edit">
                                    <i class="fas fa-pencil-alt">EDIT</i>
                                </a>
                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title=""
                                    data-original-title="Delete" wire:click="destroy('{{ $data->id }}')">
                                    <i class="fas fa-trash-alt">HAPUS</i>
                                </a>
                            </td>
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
