<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <form wire:submit.prevent="store()">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <h1 class="page-header-title">Add Layanan</h1>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->

            <div class="row">
                <div class="col-lg-4">

                </div>

                <div class="col-lg-4">
                    <!-- Card -->
                    <div class="card">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Tambah Layanan</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form -->
                            <div class="mb-4">
                                <label class="form-label">Nama Layanan</label>

                                <input type="text" class="form-control @error('nama')
                                    is-invalid @enderror" name="layanan" wire:model.defer="nama"
                                    placeholder="Masukan Nama Layanan">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-4">
                                <label class="form-label">Durasi Hari</label>

                                <input wire:model.defer="durasi" type="number" class="form-control @error('durasi')
                                    is-invalid @enderror" name="durasi"
                                    placeholder="Masukan Durasi Hari">
                                    @error('durasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-4">
                                <label class="form-label">Harga</label>

                                <input wire:model.defer="harga" type="number" class="form-control @error('harga')
                                    is-invalid  @enderror" name="layanan"
                                    placeholder="Rp.">
                                    @error('harga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <!-- End Form -->
                        </div>
                        <!-- Body -->
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-lg-4">

                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

            <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
                <!-- Card -->
                <div class="card card-sm bg-dark border-dark mx-2">
                    <div class="card-body">
                        <div class="row justify-content-center justify-content-sm-between">
                            <div class="col">

                            </div>
                            <!-- End Col -->

                            <div class="col-auto">
                                <div class="d-flex gap-3">
                                    <a href="{{ route('admin.layanan.index') }}">
                                        <button type="button" class="btn btn-ghost-light">Discard</button>
                                    </a>
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
        </div>
    </form>
</div>
