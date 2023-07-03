<?php
use Carbon\Carbon;
?>
<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="m-content mint mint-var" id="main-wrap">
        <div id="register-page">
            <div class="main-wrap">
                <!-- #### HEADER ####-->
                <header class="app-bar header" id="header">
                    <div class="container">
                        <div class="header-content">
                            <nav class="nav-menu flex-grow-1">
                                <div class="logo flex-grow-1 start-mobile">
                                    <a href="index.html">
                                        <span class="logo-main landscape medium"><img
                                                src="{{ asset('assets/images/logo_laundry.png') }}" alt="logo" />Rumah
                                            Laundry</span>
                                    </a>
                                </div>
                                <nav class="user-menu">
                                    <span class="spacer vertical-divider show-md-up"></span>
                                    <div class="menu-setting">
                                        <div class="setting">
                                            <button class="btn btn-icon waves-effect btn-small dropdown-trigger ma-1"
                                                data-target="dropdown_config" data-align="left" type="button">
                                                <i class="icon material-icons" id="setting_icon">settings</i>
                                            </button>
                                            <div class="dropdown-content setting" id="dropdown_config">
                                                <ul class="collection with-header">
                                                    <li class="collection-header">theme mode</li>
                                                    <li class="collection-item no-hover pl-4">
                                                        <div class="flex-menu">
                                                            <div class="switch">
                                                                <label>
                                                                    light
                                                                    <input id="theme_switcher" type="checkbox"><span
                                                                        class="lever"></span>
                                                                    dark
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </nav>
                        </div>
                    </div>
                </header><!-- #### END HEADER ####-->

                <!-- ##### FORM #####-->
                <div class="container-general container-front">
                    <div class="form-style">
                        <div class="page-wrap">
                            <div class="container inner-wrap">
                                <div class="auth-frame">
                                    <div class="row mb-0">
                                        <div class="col-md-6 px-lg-6 px-2">
                                            <div class="card form-box fragment-fadeUp">
                                                <div class="form-wrap">
                                                    <div class="form-style">
                                                        <div class="head">
                                                            <h4 class="use-text-title mq-md-up">
                                                                {{ $data->konsumen->nama }}
                                                            </h4>
                                                        </div>
                                                        <div class="separator">
                                                            <p>Masuk Pada Tanggal</p>
                                                        </div>
                                                        <div class="foot" style="text-align: center">
                                                            <span class="use-text-title mq-md-up"
                                                                data-class="use-text-subtitle">
                                                                {{ Carbon::parse($data->tanggal_diterima)->locale('id_ID')->isoFormat('dddd, Do MMMM YYYY') }}
                                                            </span>
                                                        </div>
                                                        <div class="separator">
                                                            <p>Detail Pakaian</p>
                                                        </div>
                                                        <form id="register_form">
                                                            <div class="row spacing3 mb-0">
                                                                <div class="col-sm-4">
                                                                    <label for="name">Nama*</label>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="name">Berat/Jumlah*</label>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="name">Harga*</label>
                                                                </div>
                                                            </div>
                                                            @foreach ($data->listtransaksi as $transaksi)
                                                            <div class="row spacing3 mb-0">
                                                                <div class="col-sm-4">
                                                                    <span>{{ $transaksi->layanan->nama }}</span>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <span>{{ $transaksi->berat }}</span>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <span>Rp.
                                                                        {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</span>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            <div class="separator">
                                                                <p>Detail Pembayaran</p>
                                                            </div>
                                                            <div class="row spacing3 mb-0">
                                                                <div class="col-sm-6">
                                                                    <div class="form-helper">
                                                                        <div class="form-control-label">
                                                                            <label>
                                                                                Total Harga*
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-helper">
                                                                        <div class="form-control-label">
                                                                            <label>
                                                                                Tanggal Ambil*
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row spacing3 mb-0">
                                                                <div class="col-sm-6">
                                                                    <span>
                                                                        Rp.{{ number_format($data->total_bayar, 0, ',', '.') }}
                                                                    </span>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <span>
                                                                        @if ($data->tanggal_diambil == null)
                                                                        <span>
                                                                            Belum Diambil
                                                                        </span>
                                                                        @else
                                                                        {{ Carbon::parse($data->tanggal_diambil)->locale('id_ID')->isoFormat('dddd, Do MMMM YYYY') }}
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="btn-area">
                                                                <div class="mt-4">
                                                                    @if ($data->status_bayar == 'belum dibayar')
                                                                    <span class="btn secondary btn-large waves-effect"
                                                                        type="submit">BELUM DIBAYAR</span>
                                                                    @elseif ($data->status_bayar == 'sudah dibayar')
                                                                    <span class="btn primary btn-large waves-effect"
                                                                        type="submit">BELUM DIBAYAR</span>
                                                                    @endif
                                                                </div>
                                                                <div class="mt-4">
                                                                    @if ($data->status_ambil == 'belum diambil')
                                                                    <span class="btn secondary btn-large waves-effect"
                                                                        type="submit">BELUM DIAMBIL</span>
                                                                    @elseif ($data->status_ambil == 'sudah diambil')
                                                                    <span class="btn primary btn-large waves-effect"
                                                                        type="submit">BELUM DIAMBIL</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="hidden-sm-down">
                                                <div class="greeting">
                                                    <h4 class="use-text-title2 use-text-primary pb-2">Data Diinput Oleh "{{ $data->user->fullname }}"
                                                    </h4>
                                                    <div class="img">
                                                        <img class="img-2d3d"
                                                            src="{{ asset('assets/images/laundry.jpg') }}"
                                                            data-2d="assets"
                                                            data-3d="{{ asset('assets/images/laundry.jpg') }}"
                                                            alt="registes" />
                                                    </div>
                                                    <div class="visible-print text-center">
                                                        {!! QrCode::size(300)->backgroundColor(144, 238, 144)->generate('rumah-laundry.my.id/detail/'.$data->id); !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- ##### END FORM #####-->

                <!-- ##### FOOTER #####-->
                <div id="footer">
                    <footer class="footer-sitemap">
                        <div class="footer-deco">
                            <div class="deco-wrap">
                                <div class="deco bottom">
                                    <svg class="wave">
                                        <g stroke="none" stroke-width="1" fill-rule="evenodd">
                                            <g transform="translate(0.000000, -725.000000)">
                                                <g>
                                                    <g>
                                                        <g transform="translate(-555.178198, 406.382977)">
                                                            <path
                                                                d="M10,311.600689 C87.2870181,401.383056 187.280219,446.273623 309.979602,446.27239 C494.028677,446.270542 495.20336,363.569388 701.676006,378.79436 C908.148653,394.019332 909.216954,439.275608 1087.67363,451.006907 C1166.59583,456.195057 1306.38903,225.111735 1609.17703,337.188584 C1811.0357,411.906484 2069.42811,332.176956 2384.35426,98 L1982.6855,405.180766 L21.2425669,523.595781 L10,311.600689 Z"
                                                                transform="translate(1197.177131, 310.797890) scale(-1, 1) rotate(3.000000) translate(-1197.177131, -310.797890) ">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="deco top">
                                    <div class="wave wave-cover"></div>
                                </div>
                            </div>
                            <div class="wave wave-cover"></div>
                        </div>
                    </footer>
                </div><!-- ##### END FOOTER #####-->
            </div>
        </div>
    </div>
</div>
