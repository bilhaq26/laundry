<div>
    <div class="container-fluid px-3">
        <div class="row">
            <div
                class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-light px-0">

                <div style="max-width: 23rem;">
                    <div class="text-center mb-5">
                        <img class="img-fluid" src="{{ asset('admin_assets/svg/logos/logo_laundry.png') }}"
                            alt="Image Description" style="width: 900px;" data-hs-theme-appearance="default">
                        <img class="img-fluid" src="{{ asset('admin_assets/svg/logos/logo_laundry.png') }}"
                            alt="Image Description" style="width: 900px;" data-hs-theme-appearance="dark">
                    </div>

                    <div class="mb-5">
                        <h2 class="display-5">Build digital Laundry with:</h2>
                    </div>

                    <!-- List Checked -->
                    <ul class="list-checked list-checked-lg list-checked-primary list-py-2">
                        <li class="list-checked-item">
                            <span class="d-block fw-semibold mb-1">All-in-one tool</span>
                            Build, run, and scale your apps - end to end
                        </li>

                        <li class="list-checked-item">
                            <span class="d-block fw-semibold mb-1">Easily add &amp; manage your services</span>
                            It brings together your tasks, projects, timelines, files and more
                        </li>
                    </ul>
                    <!-- End List Checked -->

                    <div class="row justify-content-between mt-5 gx-3">
                        <div class="col">
                            <img class="img-fluid" src="{{ asset('admin_assets/svg/brands/gitlab-gray.svg') }}"
                                alt="Logo">
                        </div>
                        <!-- End Col -->

                        <div class="col">
                            <img class="img-fluid" src="{{ asset('admin_assets/svg/brands/fitbit-gray.svg') }}"
                                alt="Logo">
                        </div>
                        <!-- End Col -->

                        <div class="col">
                            <img class="img-fluid" src="{{ asset('admin_assets/svg/brands/flow-xo-gray.svg') }}"
                                alt="Logo">
                        </div>
                        <!-- End Col -->

                        <div class="col">
                            <img class="img-fluid" src="{{ asset('admin_assets/svg/brands/layar-gray.svg') }}"
                                alt="Logo">
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Col -->

            <div class="col-lg-6 d-flex justify-content-center align-items-center min-vh-lg-100">
                <div class="w-100 content-space-t-4 content-space-t-lg-2 content-space-b-1" style="max-width: 25rem;">
                    <!-- Form -->
                    <form class="js-validate needs-validation" novalidate wire:submit.prevent="attemp()">
                        <div class="text-center">
                            <div class="mb-5">
                                <h1 class="display-5">LOGIN</h1>
                            </div>
                            @if (session('error'))
                            <div class="alert alert-warning">
                                {{ session('error') }}
                            </div>
                            @endif
                        </div>

                        <!-- Form -->
                        <div class="mb-4">
                            <label class="form-label">* Username</label>
                            <input type="text" class="form-control form-control-lg @error('username')
                                is-invalid @enderror" name="email" id="signinSrEmail" tabindex="1"
                                aria-label="email@address.com" wire:change="resVal('username')"
                                wire:model.defer="username" required>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="mb-4">
                            <label class="form-label w-100">
                                <span class="d-flex justify-content-between align-items-center">
                                    <span>* Password</span>
                                </span>
                            </label>

                            <div class="input-group input-group-merge" data-hs-validation-validate-class>
                                <input type="password"
                                    class="js-toggle-password form-control form-control-lg @error('password') is-invalid @enderror"
                                    name="password" id="signupSrPassword" placeholder="8+ characters required"
                                    aria-label="8+ characters required" required minlength="8"
                                    data-hs-toggle-password-options='{
                                "target": "#changePassTarget",
                                "defaultClass": "bi-eye-slash",
                                "showClass": "bi-eye",
                                "classChangeTarget": "#changePassIcon"
                                }' wire:model.defer="password" wire:change="resVal('password')">
                                <a id="changePassTarget" class="input-group-append input-group-text"
                                    href="javascript:;">
                                    <i id="changePassIcon" class="bi-eye"></i>
                                </a>
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- End Form -->

                        <!-- Form Check -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" wire:model.defer="remember" type="checkbox" value="" id="termsCheckbox">
                            <label class="form-check-label" for="termsCheckbox">
                                Remember me
                            </label>
                        </div>
                        <!-- End Form Check -->

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Sign in</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
</div>
