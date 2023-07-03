<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Add Transaction</h1>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->
        <form wire:submit.prevent="store()">
            <div class="row">
                <div class="col-lg-12 mb-3 mb-lg-0">
                    <!-- Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Tambah Transaksi</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label class="form-label">Nama Pelanggan</label>

                                        <div class="tom-select-custom">
                                            <select wire:model.defer="konsumen_id" class="js-select form-select @error('konsumen_id')
                                                is-invalid @enderror" autocomplete="off" data-hs-tom-select-options='{
                                                      "searchInDropdown": false,
                                                      "hidePlaceholderOnSearch": true,
                                                      "placeholder": "Pilih Nama Pelanggan .."
                                                    }'>
                                                <option value="">Pilih Nama Pelanggan ..</option>
                                                @foreach ($arrKonsumen as $konsumen)
                                                <option value="{{ $konsumen->id }}">{{ $konsumen->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('konsumen_id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <button wire:mode.defer="tambah_konsumen" type="button" class="btn btn-primary mb-3"
                                        data-bs-toggle="modal" data-bs-target="#exampleKonsumen">
                                        Tambah Konsumen
                                    </button>
                                    <!-- End Form -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-4">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label class="form-label">Pilih Tanggal Masuk</label>
                                        <input wire:model.defer="tanggal_diterima" id="session-date"
                                            type="datetime-local"
                                            class="form-control flatpickr-custom @error('tanggal_diterima') is-invalid @enderror">
                                    </div>
                                    @error('tanggal_diterima')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    <!-- End Form -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-4">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label class="form-label">Keterangan</label>
                                        <textarea wire:model.defer="keterangan" type="text" class="form-control"
                                            placeholder="Keterangan" rows="10">
                                        </textarea>
                                    </div>
                                    @error('keterangan')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-8">
                                    <label class="form-label">Daftar Layanan</label>
                                    <div class="mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <input readonly type="number" class="form-control"
                                                    value="{{ $this->getGrandTotal() }}">
                                                @error('total_bayar')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="card-body">
                                                <button wire:mode.defer="tambah" type="button"
                                                    class="btn btn-primary mb-3" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Tambah List
                                                </button>

                                                <div class="table-responsive">
                                                    <table
                                                        class="table border text-nowrap text-md-nowrap table-striped mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama Layanan</th>
                                                                <th>Berat / Jumlah</th>
                                                                <th>Harga Paket</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($this->items as $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item['nama_layanan'] }}</td>
                                                                <td>{{ $item['berat'] }}</td>
                                                                <td>{{ $item['total_bayar'] }}</td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td colspan="4" class="text-center">Tidak ada layanan
                                                                </td>
                                                            </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Row -->
                            </div>
                            <!-- Body -->
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->

                <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3"
                    style="max-width: 40rem;">
                    <!-- Card -->
                    <div class="card card-sm bg-dark border-dark mx-2">
                        <div class="card-body">
                            <div class="row justify-content-center justify-content-sm-between">
                                <div class="col">
                                </div>
                                <!-- End Col -->

                                <div class="col-auto">
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('admin.transaksi.index') }}"
                                            class="btn btn-ghost-light">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
        </form>
    </div>
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form wire:submit.prevent="addToCart()">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12" wire:ignore>
                            <div class="form-group">
                                <label class="form-label">Layanan</label>
                                <div>
                                    <select wire:model.defer="layanan_id" id="layanan" class="js-select form-select @error('layanan_id')
                                        is-invalid @enderror" autocomplete="off" data-hs-tom-select-options='{
                                        "placeholder": "Pilih Nama Pelanggan .."
                                    }'>
                                        <option value="">Pilih Nama Pelanggan ..</option>
                                        @foreach ($arrLayanan as $Layanan)
                                        <option value="{{ $Layanan->id }}">{{ $Layanan->nama }} ||
                                            Rp.{{ number_format($Layanan->harga) }}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                                @error('layanan_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Berat / Jumlah <span class="text-red">*</span></label>
                                <input wire:model.defer="berat" type="text" class="form-control"
                                    placeholder="Masukan Berat">
                            </div>
                            @error('berat')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- END MODAL LIST --}}

    {{-- MODAL KONSUMEN --}}
    <div wire:ignore.self class="modal fade" id="exampleKonsumen" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form wire:submit.prevent="konsumen()">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Konsumen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Nama Konsumen <span class="text-red">*</span></label>
                                <input wire:model.defer="nama" type="text" class="form-control @error('nama')
                                    is-invalid @enderror" placeholder="Masukan Nama">
                                @error('berat')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- END MODAL KONSUMEN --}}
</div>
@push('styles')
<style>
    input#session-date {
        display: inline-block;
        position: relative;
    }

    input[type="datetime-local"]::-webkit-calendar-picker-indicator {
        background: transparent;
        bottom: 0;
        color: transparent;
        cursor: pointer;
        height: auto;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        width: auto;
    }

</style>
@endpush
@push('script')
<script>
    $("#layanan").on('change', function () {
        var filter = $(this).val();

        @this.set('layanan_id', layanan_id);
        console.log(layanan_id);
    });

</script>
@endpush
