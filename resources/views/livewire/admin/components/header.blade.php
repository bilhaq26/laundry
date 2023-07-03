<header id="header"
    class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
    <div class="navbar-nav-wrap">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}" aria-label="Front">
            <img class="navbar-brand-logo" src="{{ asset('admin_assets/svg/logos/logo.svg') }}" alt="Logo"
                data-hs-theme-appearance="default">
            <img class="navbar-brand-logo" src="{{ asset('admin_assets/svg/logos-light/logo.svg') }}" alt="Logo"
                data-hs-theme-appearance="dark">
            <img class="navbar-brand-logo-mini" src="{{ asset('admin_assets/svg/logos/logo-short.svg') }}" alt="Logo"
                data-hs-theme-appearance="default">
            <img class="navbar-brand-logo-mini" src="{{ asset('admin_assets/svg/logos-light/logo-short.svg') }}"
                alt="Logo" data-hs-theme-appearance="dark">
        </a>
        <!-- End Logo -->

        <div class="navbar-nav-wrap-content-start">
            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align"
                    data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align"
                    data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>

            <!-- End Navbar Vertical Toggle -->

            <!-- Search Form -->
            <div class="dropdown ms-2">
                <!-- Input Group -->
                <div class="d-none d-lg-block">
                    <div
                        class="input-group input-group-merge input-group-borderless input-group-hover-light navbar-input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="bi-search"></i>
                        </div>

                        <input type="search" class="js-form-search form-control" placeholder="Search in front"
                            aria-label="Search in front" data-hs-form-search-options='{
                            "clearIcon": "#clearSearchResultsIcon",
                            "dropMenuElement": "#searchDropdownMenu",
                            "dropMenuOffset": 20,
                            "toggleIconOnFocus": true,
                            "activeClass": "focus"
                            }'>
                        <a class="input-group-append input-group-text" href="javascript:;">
                            <i id="clearSearchResultsIcon" class="bi-x-lg" style="display: none;"></i>
                        </a>
                    </div>
                </div>

                <button
                    class="js-form-search js-form-search-mobile-toggle btn btn-ghost-secondary btn-icon rounded-circle d-lg-none"
                    type="button" data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenu",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
                    <i class="bi-search"></i>
                </button>
                <!-- End Input Group -->

                <!-- Card Search Content -->
                <div id="searchDropdownMenu"
                    class="hs-form-search-menu-content dropdown-menu dropdown-menu-form-search navbar-dropdown-menu-borderless">
                    <div class="card">
                        <!-- Body -->
                        <div class="card-body-height">
                            <div class="d-lg-none">
                                <div class="input-group input-group-merge navbar-input-group mb-5">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="bi-search"></i>
                                    </div>

                                    <input type="search" class="form-control" placeholder="Search in front"
                                        aria-label="Search in front">
                                </div>
                            </div>
                        </div>
                        <!-- End Body -->
                    </div>
                </div>
                <!-- End Card Search Content -->

            </div>

            <!-- End Search Form -->
        </div>

        <div class="navbar-nav-wrap-content-end">
            <!-- Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <!-- Notification -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                            id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                            data-bs-auto-close="outside" data-bs-dropdown-animation>
                            <i class="bi-bell"></i>
                            <span class="btn-status btn-sm-status btn-status-danger"></span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless"
                            aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
                            <div class="card">
                                <!-- Header -->
                                <div class="card-header card-header-content-between">
                                    <h4 class="card-title mb-0">Notifications</h4>

                                    <!-- Unfold -->
                                    <div class="dropdown">
                                        <button type="button"
                                            class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle"
                                            id="navbarNotificationsDropdownSettings" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi-three-dots-vertical"></i>
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless"
                                            aria-labelledby="navbarNotificationsDropdownSettings">
                                            <span class="dropdown-header">Settings</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi-archive dropdown-item-icon"></i> Archive all
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi-check2-all dropdown-item-icon"></i> Mark all as read
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi-toggle-off dropdown-item-icon"></i> Disable
                                                notifications
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi-gift dropdown-item-icon"></i> What's new?
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <span class="dropdown-header">Feedback</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Unfold -->
                                </div>
                                <!-- End Header -->

                                <!-- Nav -->
                                <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#notificationNavOne"
                                            id="notificationNavOne-tab" data-bs-toggle="tab"
                                            data-bs-target="#notificationNavOne" role="tab"
                                            aria-controls="notificationNavOne" aria-selected="true">Messages (3)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#notificationNavTwo" id="notificationNavTwo-tab"
                                            data-bs-toggle="tab" data-bs-target="#notificationNavTwo" role="tab"
                                            aria-controls="notificationNavTwo" aria-selected="false">Archived</a>
                                    </li>
                                </ul>
                                <!-- End Nav -->

                                <!-- Body -->
                                <div class="card-body-height">
                                    <!-- Tab Content -->
                                    <div class="tab-content" id="notificationTabContent">
                                        <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel"
                                            aria-labelledby="notificationNavOne-tab">
                                            <!-- List Group -->
                                            <ul class="list-group list-group-flush navbar-card-list-group">
                                                <!-- Item -->
                                                <li class="list-group-item form-check-select">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="notificationCheck5">
                                                                    <label class="form-check-label"
                                                                        for="notificationCheck5"></label>
                                                                    <span class="form-check-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-circle">
                                                                    <img class="avatar-img"
                                                                        src="{{ asset('admin_assets/img/160x160/img7.jpg') }}"
                                                                        alt="Image Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col ms-n2">
                                                            <h5 class="mb-1">Sara Villar</h5>
                                                            <p class="text-body fs-5">completed <i
                                                                    class="bi-journal-bookmark-fill text-primary"></i>
                                                                FD-7 task</p>
                                                        </div>
                                                        <!-- End Col -->

                                                        <small class="col-auto text-muted text-cap">2mn</small>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->
                                            </ul>
                                            <!-- End List Group -->
                                        </div>

                                        <div class="tab-pane fade" id="notificationNavTwo" role="tabpanel"
                                            aria-labelledby="notificationNavTwo-tab">
                                            <!-- List Group -->
                                            <ul class="list-group list-group-flush navbar-card-list-group">
                                                <!-- Item -->
                                                <li class="list-group-item form-check-select">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="notificationCheck6">
                                                                    <label class="form-check-label"
                                                                        for="notificationCheck6"></label>
                                                                    <span class="form-check-stretched-bg"></span>
                                                                </div>
                                                                <div
                                                                    class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                                                    <span class="avatar-initials">A</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col ms-n2">
                                                            <h5 class="mb-1">Anne Richard</h5>
                                                            <p class="text-body fs-5">accepted your invitation to
                                                                join Notion</p>
                                                        </div>
                                                        <!-- End Col -->

                                                        <small class="col-auto text-muted text-cap">1dy</small>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->
                                            </ul>
                                            <!-- End List Group -->
                                        </div>
                                    </div>
                                    <!-- End Tab Content -->
                                </div>
                                <!-- End Body -->

                                <!-- Card Footer -->
                                <a class="card-footer text-center" href="#">
                                    View all notifications <i class="bi-chevron-right"></i>
                                </a>
                                <!-- End Card Footer -->
                            </div>
                        </div>
                    </div>
                    <!-- End Notification -->
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <!-- Apps -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-icon btn-ghost-secondary rounded-circle"
                            id="navbarAppsDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                            data-bs-dropdown-animation>
                            <i class="bi-app-indicator"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless"
                            aria-labelledby="navbarAppsDropdown" style="width: 25rem;">
                            <div class="card">
                                <!-- Header -->
                                <div class="card-header">
                                    <h4 class="card-title">Web apps &amp; services</h4>
                                </div>
                                <!-- End Header -->

                                <!-- Body -->
                                <div class="card-body card-body-height">
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img class="avatar avatar-xs avatar-4x3"
                                                    src="{{ asset('admin_assets/svg/brands/frontapp-icon.svg') }}"
                                                    alt="Image Description">
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-3">
                                                <h5 class="mb-0">Frontapp</h5>
                                                <p class="card-text text-body">The inbox for teams</p>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img class="avatar avatar-xs avatar-4x3"
                                                    src="{{ asset('admin_assets/svg/illustrations/review-rating-shield.svg') }}"
                                                    alt="Image Description">
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-3">
                                                <h5 class="mb-0">HS Support</h5>
                                                <p class="card-text text-body">Customer service and support</p>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar avatar-sm avatar-soft-dark">
                                                    <span class="avatar-initials"><i class="bi-grid"></i></span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-3">
                                                <h5 class="mb-0">More Front products</h5>
                                                <p class="card-text text-body">Check out more HS products</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- End Body -->

                                <!-- Footer -->
                                <a class="card-footer text-center" href="#">
                                    View all apps <i class="bi-chevron-right"></i>
                                </a>
                                <!-- End Footer -->
                            </div>
                        </div>
                    </div>
                    <!-- End Apps -->
                </li>

                <li class="nav-item">
                    <!-- Account -->
                    <div class="dropdown">
                        <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside"
                            data-bs-dropdown-animation>
                            <div class="avatar avatar-sm avatar-circle">
                                <img class="avatar-img"
                                    src="{{ asset('/storage/images/users/small/' . Auth::user()->photo) }}"
                                    alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account"
                            aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                            <div class="dropdown-item-text">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img"
                                            src="{{ asset('/storage/images/users/small/' . Auth::user()->photo) }}"
                                            alt="Image Description">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-0">{{ Auth::user()->username }}</h5>
                                        <p class="card-text text-body">{{ Auth::user()->username }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>
                            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    <span class="legend-indicator bg-success me-1"></span> <i
                                        class="bi bi-house-door-fill"></i> Dashboard
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.transaksi.index') }}">
                                    <span class="legend-indicator bg-success me-1"></span> <i class="bi bi-bag"></i>Transaksi
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.layanan.index') }}">
                                    <span class="legend-indicator bg-success me-1"></span><i class="bi bi-person-fill-gear"></i> Daftar Layanan
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.konsumen.index') }}">
                                    <span class="legend-indicator bg-success me-1"></span><i class="bi bi-person-fill-add"></i> Daftar Konsumen
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.informasi.pelanggan') }}">
                                    <span class="legend-indicator bg-success me-1"></span><i class="bi bi-info-circle-fill"></i> Informasi Pelanggan
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.informasi.layanan') }}">
                                    <span class="legend-indicator bg-success me-1"></span><i class="bi bi-info-circle-fill"></i> Informasi Layanan
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.keuangan.bayar') }}">
                                    <span class="legend-indicator bg-success me-1"></span><i class="bi bi-flag"></i> Laporan
                                </a>
                            @else
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    <span class="legend-indicator bg-success me-1"></span> <i
                                        class="bi bi-house-door-fill"></i> Dashboard
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.transaksi.index') }}">
                                    <span class="legend-indicator bg-success me-1"></span> <i class="bi bi-bag"></i>Transaksi
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.layanan.index') }}">
                                    <span class="legend-indicator bg-success me-1"></span><i class="bi bi-person-fill-gear"></i> Daftar Layanan
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.konsumen.index') }}">
                                    <span class="legend-indicator bg-success me-1"></span><i class="bi bi-person-fill-add"></i> Daftar Konsumen
                                </a>

                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                    <!-- End Account -->
                </li>
            </ul>
            <!-- End Navbar -->
        </div>
    </div>
</header>
