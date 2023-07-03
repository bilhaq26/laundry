<?php

namespace App\Http\Livewire\Admin\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        $menus = [
            [
                'title' => 'Dashboard',
                'icon' => 'bi-house-door nav-icon',
                'url' => route('admin.dashboard'),
                'active' => request()->routeIs('admin.dashboard'),
                'children' => []
            ],
            [
                'title' => 'Informasi',
                'icon' => 'bi-info-circle nav-icon',
                'url' => '#',
                'child' => 'informasi',
                'active' => request()->routeIs('admin.informasi.*'),
                'children' => [
                    [
                        'title' => 'Pelanggan',
                        'url' => route('admin.informasi.pelanggan'),
                        'child' => 'pelanggan',
                        'active' => request()->routeIs('admin.informasi.pelanggan')
                    ],
                    [
                        'title' => 'Layanan',
                        'url' => route('admin.informasi.layanan'),
                        'child' => 'layanan',
                        'active' => request()->routeIs('admin.informasi.layanan')
                    ],
                ]
            ],

            [
                'title' => 'Layanan',
                'icon' => 'bi-bag nav-icon',
                'url' => '#',
                'child' => 'layanan',
                'active' => request()->routeIs('admin.layanan.*'),
                'children' => [
                    [
                        'title' => 'Layanan',
                        'url' => route('admin.layanan.index'),
                        'child' => 'layanan',
                        'active' => request()->routeIs('admin.layanan.index')
                    ],
                    [
                        'title' => 'Konsumen',
                        'url' => route('admin.konsumen.index'),
                        'child' => 'konsumen',
                        'active' => request()->routeIs('admin.konsumen.index')
                    ],
                    [
                        'title' => 'Transaksi',
                        'url' => route('admin.transaksi.index'),
                        'child' => 'transaksi',
                        'active' => request()->routeIs('admin.transaksi.index')
                    ],
                    [
                        'title' => 'Laporan',
                        'url' => route('admin.keuangan.bayar'),
                        'child' => 'laporan',
                        'active' => request()->routeIs('admin.keuangan.bayar')
                    ]
                ]
            ],

            [
                'title' => 'Pengguna',
                'icon' => 'bi-people nav-icon',
                'url' => '#',
                'child' => 'pengguna',
                'active' => request()->routeIs('admin.pengguna.*'),
                'children' => [
                    [
                        'title' => 'User',
                        'url' => route('admin.user.index'),
                        'child' => 'pengguna',
                        'active' => request()->routeIs('admin.user.index')
                    ]
                ]
            ]
        ];
        return view('livewire.admin.components.sidebar',[
            'menus' => $menus
        ]);
    }
}
