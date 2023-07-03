<?php

namespace App\Http\Livewire\Admin\Dashboard;


use Carbon\Carbon;
use Livewire\Component;
use Carbon\CarbonPeriod;
use App\Models\Transaksi;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class Index extends Component
{
    public $type = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    public $colors = [
        'Januari' => '#FF6384',
        'Februari' => '#36A2EB',
        'Maret' => '#FFCE56',
        'April' => '#FF6384',
        'Mei' => '#36A2EB',
        'Juni' => '#FFCE56',
        'Juli' => '#FF6384',
        'Agustus' => '#36A2EB',
        'September' => '#FFCE56',
        'Oktober' => '#FF6384',
        'November' => '#36A2EB',
        'Desember' => '#FFCE56',
    ];

    protected $listeners = [
        'onColumnClick' => 'handleOnColumnClick',
    ];

    public $firstrun = true;

    public $showDataLabels = false;

    public function render()
    {
        // CHART
        $transaksi = Transaksi::whereIn('tanggal_diterima', $this->type)->get();
        //  make Columnchartmodel with transaksi
        $columnChartModel = LivewireCharts::columnChartModel()
            ->setTitle('Transaksi')
            ->setAnimated($this->firstrun)
            ->withOnColumnClickEventName('onColumnClick')
            ->setXAxisVisible(true)
            ->setColors($this->colors)
            ->setDataLabelsEnabled($this->showDataLabels);


        //SEMUA TRANSAKSI
        $semuatransaksi = Transaksi::count();
        $transaksihari = Transaksi::whereDate('tanggal_diterima', today())->count();
        $transaksimingguan = Transaksi::whereBetween('tanggal_diterima', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $transaksibulan = Transaksi::whereMonth('tanggal_diterima', now()->month)->count();
        $transaksitahun = Transaksi::whereYear('tanggal_diterima', now()->year)->count();

        //BAYAR/AMBIL
        $belumbayar = Transaksi::where('status_bayar', 'belum dibayar')->count();
        $belumambil = Transaksi::where('status_ambil', 'belum diambil')->count();
        $sudahambil = Transaksi::where('status_ambil', 'sudah diambil')->count();
        $sudahbayar = Transaksi::where('status_bayar', 'sudah dibayar')->count();


        // PENDAPATAN
        $pendapatan = Transaksi::sum('total_bayar');
        $pendapatanharian = Transaksi::whereDate('tanggal_dibayar', today())->where('status_bayar', 'sudah dibayar')->sum('total_bayar');
        $pendapatanmingguan = Transaksi::whereBetween('tanggal_dibayar', [now()->startOfWeek(), now()->endOfWeek()])->where('status_bayar', 'sudah dibayar')->sum('total_bayar');
        $pendapatanbulan = Transaksi::whereMonth('tanggal_dibayar', now()->month)->where('status_bayar', 'sudah dibayar')->sum('total_bayar');
        $pendapatantahunan = Transaksi::whereYear('tanggal_dibayar', now()->year)->where('status_bayar', 'sudah dibayar')->sum('total_bayar');
        // dd($pendapatanbulan);

        $hasiltahunan = Transaksi::whereYear('tanggal_diterima', now()->year)->sum('total_bayar');
        $hasilbulanan = Transaksi::whereMonth('tanggal_diterima', now()->month)->sum('total_bayar');
        $hasilmingguan = Transaksi::whereBetween('tanggal_diterima', [now()->startOfWeek(), now()->endOfWeek()])->sum('total_bayar');
        $hasilharian = Transaksi::whereDate('tanggal_diterima', today())->sum('total_bayar');

        // BELUM BAYAR
        $belumbayarharian = Transaksi::whereDate('tanggal_diterima', today())->where('status_bayar', 'belum dibayar')->sum('total_bayar');
        $belumbayarmingguan = Transaksi::whereBetween('tanggal_diterima', [now()->startOfWeek(), now()->endOfWeek()])->where('status_bayar', 'belum dibayar')->sum('total_bayar');
        $belumbayarbulanan = Transaksi::whereMonth('tanggal_diterima', now()->month)->where('status_bayar', 'belum dibayar')->sum('total_bayar');
        $belumbayartahunan = Transaksi::whereYear('tanggal_diterima', now()->year)->where('status_bayar', 'belum dibayar')->sum('total_bayar');

        // TRANSAKSI TERAKHIR
        $transaksiterakhir = Transaksi::orderBy('tanggal_diterima')->take(4)->get();


        return view('livewire.admin.dashboard.index',[
            'columnChartModel' => $columnChartModel,
            'semuatransaksi' => $semuatransaksi,
            'transaksihari' => $transaksihari,
            'transaksimingguan' => $transaksimingguan,
            'transaksibulan' => $transaksibulan,
            'transaksitahun' => $transaksitahun,


            'belumbayar' => $belumbayar,
            'belumambil' => $belumambil,
            'sudahambil' => $sudahambil,
            'sudahbayar' => $sudahbayar,

            'pendapatan' => $pendapatan,
            'pendapatanharian' => $pendapatanharian,
            'pendapatanmingguan' => $pendapatanmingguan,
            'pendapatanbulan' => $pendapatanbulan,
            'pendapatantahunan' => $pendapatantahunan,

            'hasiltahunan' => $hasiltahunan,
            'hasilbulanan' => $hasilbulanan,
            'hasilmingguan' => $hasilmingguan,
            'hasilharian' => $hasilharian,

            'belumbayarharian' => $belumbayarharian,
            'belumbayarmingguan' => $belumbayarmingguan,
            'belumbayarbulanan' => $belumbayarbulanan,
            'belumbayartahunan' => $belumbayartahunan,

            'transaksiterakhir' => $transaksiterakhir,

        ])
            ->layout('admin.layouts.app');
    }
}
