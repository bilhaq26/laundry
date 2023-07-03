<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="content container-fluid">
        <!-- Step Form -->
        <form class="js-step-form py-md-5" wire:submit.prevent="store()">
            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <!-- Step -->
                    <ul id="addUserStepFormProgress"
                        class="js-step-progress step step-sm step-icon-sm step step-inline step-item-between mb-3 mb-md-5">
                        <li class="step-item">
                            <a class="step-content-wrapper" href="javascript:;">
                                <span class="step-icon step-icon-soft-dark">+</span>
                                <div class="step-content">
                                    <span class="step-title">Tambah Pengguna</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- End Step -->

                    <!-- Content Step Form -->
                    <div id="addUserStepFormContent">
                            <!-- Card -->
                            <div id="addUserStepProfile" class="card card-lg active">
                                <!-- Body -->
                                <div class="card-body">
                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label form-label">Avatar</label>

                                        <div class="col-sm-9">
                                            <div class="d-flex align-items-center">
                                                <!-- Avatar -->
                                                <label class="avatar avatar-xl avatar-circle avatar-uploader me-5"
                                                    for="avatarUploader">
                                                    @if ($photo_profil)
                                                        <img id="avatarImg" class="avatar-img"
                                                            src="{{ $photo_profil->temporaryUrl() }}" alt="Image Description">
                                                    @endif

                                                    <input type="file" class="js-file-attach avatar-uploader-input @error('photo_profil') is-invalid @enderror"
                                                        id="avatarUploader" accept="image/jpeg, .jpeg, .jpg, image/png, .png" wire:model="photo_profil">
                                                    <span class="avatar-uploader-trigger">
                                                        <i class="bi-pencil avatar-uploader-icon shadow-sm"></i>
                                                    </span>
                                                </label>
                                                <!-- End Avatar -->
                                            </div>
                                            @error('photo_profil')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Full name <i
                                                class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Displayed on public forums, such as Front."></i></label>

                                        <div class="col-sm-9">
                                            <div class="input-group input-group-sm-vertical">
                                                <input type="text" class="form-control @error('nama_lengkap')
                                                    is-invalid @enderror" name="firstName" id="firstNameLabel" wire:model.defer="nama_lengkap"
                                                    placeholder="*Nama Lengkap">
                                            </div>
                                            @error('nama_lengkap')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Username <i
                                                class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Displayed on public forums, such as Front."></i></label>

                                        <div class="col-sm-9">
                                            <div class="input-group input-group-sm-vertical">
                                                <input type="text" class="form-control @error('username')
                                                    is-invalid  @enderror" name="firstName" id="firstNameLabel"  wire:model.defer="username"
                                                    placeholder="*Username">
                                            </div>
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

                                        <div class="col-sm-9">
                                            <input type="email" class="form-control @error('email')
                                                is-invalid @enderror" name="email" wire:model="email" placeholder="*Email">
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="emailLabel" class="col-sm-3 col-form-label form-label">Password</label>

                                        <div class="col-sm-9">
                                            <input type="password" class="form-control @error('password')
                                                is-invalid @enderror" name="password" wire:model.defer="password" placeholder="*Password">
                                        </div>

                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Pilih Role <i
                                                class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Displayed on public forums, such as Front."></i></label>

                                        <div class="col-sm-9">
                                            <div class="input-group input-group-sm-vertical">
                                                <select class="form-control" wire:model.defer="jenis_pengguna">
                                                    <option hidden>Pilih Jenis Pengguna</option>
                                                    @foreach ($arrRoles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('jenis_pengguna')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Form -->
                                </div>
                                <!-- End Body -->

                                <!-- Footer -->
                                <div class="card-footer d-flex justify-content-end align-items-center">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan <i class="bi-chevron-right"></i>
                                    </button>
                                </div>
                                <!-- End Footer -->
                            </div>
                            <!-- End Card -->
                    </div>
                    <!-- End Content Step Form -->
                </div>
            </div>
            <!-- End Row -->
        </form>
        <!-- End Step Form -->
    </div>
</div>
