<div>
    {{-- Be like water. --}}
    <form wire:submit.prevent="store()">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <h1 class="page-header-title">Add Konsumen</h1>
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
                            <h4 class="card-header-title">Tambah Pelanggan</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form -->
                            <div class="mb-4">
                                <label class="form-label">Nama Pelanggan</label>

                                <input type="text" class="form-control @error('nama')
                                    is-invalid @enderror" name="layanan" wire:model.defer="nama"
                                    placeholder="Masukan Nama Pelanggan">
                                    @error('nama')
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
                                    <a href="{{ route('admin.konsumen.index') }}">
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
