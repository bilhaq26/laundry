<div>
    {{-- The Master doesn't talk, he acts. --}}
    <aside
        class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset">
                <!-- Logo -->

                <a class="navbar-brand" href="{{ route('admin.dashboard') }}" aria-label="Front">
                    <img class="navbar-brand-logo" src="{{ asset('admin_assets/svg/logos/s_logo.png') }}" alt="Logo"
                        data-hs-theme-appearance="default">
                    <img class="navbar-brand-logo" src="{{ asset('admin_assets/svg/logos-light/s_logo.png') }}" alt="Logo"
                        data-hs-theme-appearance="dark">
                    <img class="navbar-brand-logo-mini" src="{{ asset('admin_assets/svg/logos/logo-short.svg') }}"
                        alt="Logo" data-hs-theme-appearance="default">
                    <img class="navbar-brand-logo-mini" src="{{ asset('admin_assets/svg/logos-light/logo-short.svg') }}"
                        alt="Logo" data-hs-theme-appearance="dark">
                </a>

                <!-- End Logo -->

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

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <div class="nav nav-pills nav-vertical card-navbar-nav">
                        <!-- Collapse -->
                        @foreach ($menus as $menu)
                        <span class="dropdown-header mt-2">{{ $menu['title'] }}</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small>
                        <div class="nav-item">
                            @if (count($menu['children'])>0)
                            <a class="nav-link dropdown-toggle @if ($menu['active']) active @endif"
                                href="#{{ $menu['child'] }}" role="button" data-bs-toggle="collapse"
                                data-bs-target="#{{ $menu['child'] }}" aria-expanded="true"
                                aria-controls="{{ $menu['child'] }}">
                                <i class="{{ $menu['icon'] }}"></i>
                                <span class="nav-link-title">{{ $menu['title'] }}</span>
                            </a>

                            @foreach ($menu['children'] as $child)
                            <div id="{{ $menu['child'] }}" class="nav-collapse collapse @if ($child['active'])
                                        show
                                    @endif">
                                <a class="nav-link @if ($child['active'])
                                        active
                                    @endif" href="{{ $child['url'] }}">{{ $child['title'] }}</a>
                            </div>
                            @endforeach

                            @else
                            <a class="nav-link @if ($menu['active'])
                            active collapsed
                            @endif" href="{{ $menu['url'] }}" data-placement="left">
                                <i class="{{ $menu['icon'] }}"></i>
                                <span class="nav-link-title">{{ $menu['title'] }}</span>
                            </a>
                            @endif
                        </div>
                        @endforeach
                    </div>

                </div>
                <!-- End Content -->

                <!-- Footer -->
                <div class="navbar-vertical-footer">
                    <ul class="navbar-vertical-footer-list">
                        <li class="navbar-vertical-footer-list-item">
                            <!-- Style Switcher -->
                            <div class="dropdown dropup">
                                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                                    id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-dropdown-animation>

                                </button>

                                <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless"
                                    aria-labelledby="selectThemeDropdown">
                                    <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                                        <i class="bi-moon-stars me-2"></i>
                                        <span class="text-truncate" title="Auto (system default)">Auto (system
                                            default)</span>
                                    </a>
                                    <a class="dropdown-item" href="#" data-icon="bi-brightness-high"
                                        data-value="default">
                                        <i class="bi-brightness-high me-2"></i>
                                        <span class="text-truncate" title="Default (light mode)">Default (light
                                            mode)</span>
                                    </a>
                                    <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                                        <i class="bi-moon me-2"></i>
                                        <span class="text-truncate" title="Dark">Dark</span>
                                    </a>
                                </div>
                            </div>

                            <!-- End Style Switcher -->
                        </li>
                    </ul>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </aside>
</div>
