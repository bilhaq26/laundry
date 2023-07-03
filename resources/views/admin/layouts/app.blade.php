<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Dashboard | Front - Admin &amp; Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-icons/font/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css') }}">

    <!-- CSS Front Template -->

    <link rel="preload" href="{{ asset('admin_assets/css/theme.min.css') }}" data-hs-appearance="default" as="style">
    <link rel="preload" href="{{ asset('admin_assets/css/theme-dark.min.css') }}" data-hs-appearance="dark" as="style">

    <!-- CSS Extra -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/flatpickr/dist/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css') }}">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">


    <style data-hs-appearance-onload-styles>
        * {
            transition: unset !important;
        }

        body {
            opacity: 0;
        }

    </style>

    <script>
        window.hs_config = {
            "autopath": "@@autopath",
            "deleteLine": "hs-builder:delete",
            "deleteLine:build": "hs-builder:build-delete",
            "deleteLine:dist": "hs-builder:dist-delete",
            "previewMode": false,
            "startPath": "/index.html",
            "vars": {
                "themeFont": "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap",
                "version": "?v=1.0"
            },
            "layoutBuilder": {
                "extend": {
                    "switcherSupport": true
                },
                "header": {
                    "layoutMode": "default",
                    "containerMode": "container-fluid"
                },
                "sidebarLayout": "default"
            },
            "themeAppearance": {
                "layoutSkin": "default",
                "sidebarSkin": "default",
                "styles": {
                    "colors": {
                        "primary": "#377dff",
                        "transparent": "transparent",
                        "white": "#fff",
                        "dark": "132144",
                        "gray": {
                            "100": "#f9fafc",
                            "900": "#1e2022"
                        }
                    },
                    "font": "Inter"
                }
            },
            "languageDirection": {
                "lang": "en"
            },
            "skipFilesFromBundle": {
                "dist": ["assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js",
                    "assets/js/demo.js"
                ],
                "build": ["assets/css/theme.css",
                    "assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js",
                    "assets/js/demo.js", "assets/css/theme-dark.css", "assets/css/docs.css",
                    "assets/vendor/icon-set/style.css", "assets/js/hs.theme-appearance.js",
                    "assets/js/hs.theme-appearance-charts.js",
                    "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js",
                    "assets/js/demo.js"
                ]
            },
            "minifyCSSFiles": ["assets/css/theme.css", "assets/css/theme-dark.css"],
            "copyDependencies": {
                "dist": {
                    "*assets/js/theme-custom.js": ""
                },
                "build": {
                    "*assets/js/theme-custom.js": "",
                    "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
                }
            },
            "buildFolder": "",
            "replacePathsToCDN": {},
            "directoryNames": {
                "src": "./src",
                "dist": "./dist",
                "build": "./build"
            },
            "fileNames": {
                "dist": {
                    "js": "theme.min.js",
                    "css": "theme.min.css"
                },
                "build": {
                    "css": "theme.min.css",
                    "js": "theme.min.js",
                    "vendorCSS": "vendor.min.css",
                    "vendorJS": "vendor.min.js"
                }
            },
            "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
        }
        window.hs_config.gulpRGBA = (p1) => {
            const options = p1.split(',')
            const hex = options[0].toString()
            const transparent = options[1].toString()

            var c;
            if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
                c = hex.substring(1).split('');
                if (c.length == 3) {
                    c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c = '0x' + c.join('');
                return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
            }
            throw new Error('Bad Hex');
        }
        window.hs_config.gulpDarken = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = -parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
        window.hs_config.gulpLighten = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }

    </script>
    @livewireStyles
    @stack('styles')
    @livewireScripts
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

    <script src="{{ asset('admin_assets/js/hs.theme-appearance.js') }}"></script>

    <script
        src="{{ asset('admin_assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js') }}">
    </script>

    <!-- ========== HEADER ========== -->
    @livewire('admin.components.header')


    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Navbar Vertical -->

    @livewire('admin.components.sidebar')

    <!-- End Navbar Vertical -->

    <main id="content" role="main" class="main">
        <!-- Content -->
        {{ $slot }}
        <!-- End Content -->

        <!-- Footer -->

        @livewire('admin.components.footer')

        <!-- End Footer -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- JS Global Compulsory  -->
    <script src="{{ asset('admin_assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('admin_assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js') }}">
    </script>
    <script src="{{ asset('admin_assets/vendor/hs-form-search/dist/hs-form-search.min.js') }}"></script>

    <script src="{{ asset('admin_assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js') }}">
    </script>
    <script src="{{ asset('admin_assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/tom-select/dist/js/tom-select.complete.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/clipboard/dist/clipboard.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables.net.extensions/select/select.min.js') }}"></script>

    <!-- JS Front -->
    <script src="{{ asset('admin_assets/js/theme.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/hs.theme-appearance-charts.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function () {
            // INITIALIZATION OF DATERANGEPICKER
            // =======================================================
            $('.js-daterangepicker').daterangepicker();

            $('.js-daterangepicker-times').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });

            var start = moment();
            var end = moment();

            function cb(start, end) {
                $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format(
                    'MMM D') + ' - ' + end.format('MMM D, YYYY'));
            }

            $('#js-daterangepicker-predefined').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end);
        });


        // INITIALIZATION OF DATATABLES
        // =======================================================
        HSCore.components.HSDatatables.init($('#datatable'), {
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                classMap: {
                    checkAll: '#datatableCheckAll',
                    counter: '#datatableCounter',
                    counterInfo: '#datatableCounterInfo'
                }
            },
            language: {
                zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
            }
        });

        const datatable = HSCore.components.HSDatatables.getItem(0)

        document.querySelectorAll('.js-datatable-filter').forEach(function (item) {
            item.addEventListener('change', function (e) {
                const elVal = e.target.value,
                    targetColumnIndex = e.target.getAttribute('data-target-column-index'),
                    targetTable = e.target.getAttribute('data-target-table');

                HSCore.components.HSDatatables.getItem(targetTable).column(targetColumnIndex).search(
                    elVal !== 'null' ? elVal : '').draw()
            })
        })

    </script>

    <!-- JS Plugins Init. -->
    <script>
        (function () {
            localStorage.removeItem('hs_theme')

            window.onload = function () {


                // INITIALIZATION OF NAVBAR VERTICAL ASIDE
                // =======================================================
                new HSSideNav('.js-navbar-vertical-aside').init()


                // INITIALIZATION OF FORM SEARCH
                // =======================================================
                const HSFormSearchInstance = new HSFormSearch('.js-form-search')

                if (HSFormSearchInstance.collection.length) {
                    HSFormSearchInstance.getItem(1).on('close', function (el) {
                        el.classList.remove('top-0')
                    })

                    document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
                        let dataOptions = JSON.parse(e.currentTarget.getAttribute(
                                'data-hs-form-search-options')),
                            $menu = document.querySelector(dataOptions.dropMenuElement)

                        $menu.classList.add('top-0')
                        $menu.style.left = 0
                    })
                }


                // INITIALIZATION OF BOOTSTRAP DROPDOWN
                // =======================================================
                HSBsDropdown.init()

                // INITIALIZATION OF SELECT
                // =======================================================
                HSCore.components.HSTomSelect.init('.js-select')


                // INITIALIZATION OF CLIPBOARD
                // =======================================================
                HSCore.components.HSClipboard.init('.js-clipboard')
            }
        })()

    </script>
    <script>
        (function() {
          // INITIALIZATION OF CHARTJS
          // =======================================================
          document.querySelectorAll('.js-chart').forEach(item => {
            HSCore.components.HSChartJS.init(item)
          })
        })();
      </script>

    <!-- Style Switcher JS -->

    <script>
        (function () {
            // STYLE SWITCHER
            // =======================================================
            const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
            const $variants = document.querySelectorAll(
                `[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

            // Function to set active style in the dorpdown menu and set icon for dropdown trigger
            const setActiveStyle = function () {
                $variants.forEach($item => {
                    if ($item.getAttribute('data-value') === HSThemeAppearance
                        .getOriginalAppearance()) {
                        $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                        return $item.classList.add('active')
                    }

                    $item.classList.remove('active')
                })
            }

            // Add a click event to all items of the dropdown to set the style
            $variants.forEach(function ($item) {
                $item.addEventListener('click', function () {
                    HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
                })
            })

            // Call the setActiveStyle on load page
            setActiveStyle()

            // Add event listener on change style to call the setActiveStyle function
            window.addEventListener('on-hs-appearance-change', function () {
                setActiveStyle()
            })
        })()

    </script>
    <!-- Js Extra-->
    <script src="{{ asset('admin_assets/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/tom-select/dist/js/tom-select.complete.min.js') }}"></script>
    <script>
        (function () {
            // INITIALIZATION OF FLATPICKR
            // =======================================================
            HSCore.components.HSFlatpickr.init('.js-flatpickr')
        })();
    </script>
    <script>
        (function () {
            // INITIALIZATION OF SELECT
            // =======================================================
            HSCore.components.HSTomSelect.init('.js-select')
        })();
    </script>

    <!-- SWEETALERT -->
    <script src="{{ asset('plugins/sweetalert/sweatalert2@11') }}"></script>
    <script src="{{ asset('plugins/sweetalert/toastr.min.js') }}"></script>
    <script>
        const SwalModal = (icon, title, html) => {
            Swal.fire({
                icon,
                title,
                html
            })
        }

        const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
            Swal.fire({
                icon,
                title,
                html,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText,
                reverseButtons: true,
            }).then(result => {
                if (result.value) {
                    return livewire.emit(method, params)
                }

                if (callback) {
                    return livewire.emit(callback)
                }
            })
        }

        const SwalAlert = (icon, title, timeout = 1000) => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                showCloseButton: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon,
                title
            })
        }

        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('swal:modal', data => {
                SwalModal(data.icon, data.title, data.text)
            })

            this.livewire.on('swal:confirm', data => {
                SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data
                    .params,
                    data.callback)
            })

            this.livewire.on('swal:alert', data => {
                SwalAlert(data.icon, data.title, data.timeout)
            })
        });

    </script>
    @stack('script')
    @livewireChartsScripts
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

    <!-- End Style Switcher JS -->
</body>

</html>
