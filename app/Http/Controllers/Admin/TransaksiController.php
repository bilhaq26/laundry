<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\ListTransaksi;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransaksiResource;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::paginate(10);
        return TransaksiResource::collection($data);
    }

    public function show($id)
    {
        $data = Transaksi::find($id);
        return new TransaksiResource($data);
    }

    public function detailTransaksi($id)
    {
        $data = ListTransaksi::where('transaksi_id', $id)->get();
        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $id,
                'layanan' => $data->pluck('layanan.nama'),
                'berat' => $data->pluck('berat'),
                'harga' => $data->pluck('total_bayar'),
                'total harga' => $data->sum('total_bayar'),
            ]
        ]);
    }

    public function search($param)
    {
        // search by nama konsumen
        $data = Transaksi::whereHas('Konsumen', function ($q) use ($param) {
            $q->where('nama', 'like', "%$param%");
        })->paginate(10);
        return TransaksiResource::collection($data);
    }

    public function store()
    {
        $validate = request()->validate([
            'konsumen_id' => 'required',
            'keterangan' => 'nullable',
            'tanggal_diterima' => 'required',
        ]);

        if($validate){
            $data = new Transaksi();
            $data->konsumen_id = request()->konsumen_id;
            $data->keterangan = request()->keterangan;
            $data->status_bayar = 'belum dibayar';
            $data->status_ambil = 'belum diambil';
            $data->tanggal_diterima = request()->tanggal_diterima;
            $data->total_bayar = request()->getGrandTotal();
            $data->save();

            if($data){
                foreach(request()->items as $item){
                    ListTransaksi::create([
                        'transaksi_id' => $data->id,
                        'layanan_id' => $item['layanan_id'],
                        'berat' => $item['berat'],
                        'total_bayar' => $item['total_bayar'],
                    ]);
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Transaksi berhasil ditambahkan',
            ]);
        }
    }

    public function update($id)
    {
        $validate = request()->validate([
            'konsumen_id' => 'required',
            'keterangan' => 'nullable',
            'tanggal_diterima' => 'required',
        ]);

        if($validate){
            $data = Transaksi::find($id);
            $data->konsumen_id = request()->konsumen_id;
            $data->keterangan = request()->keterangan;
            $data->tanggal_diterima = request()->tanggal_diterima;
            $data->total_bayar = request()->getGrandTotal();
            $data->save();

            if($data){
                foreach(request()->items as $item){
                    ListTransaksi::create([
                        'transaksi_id' => $data->id,
                        'layanan_id' => $item['layanan_id'],
                        'berat' => $item['berat'],
                        'total_bayar' => $item['total_bayar'],
                    ]);
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Transaksi berhasil diupdate',
            ]);
        }
    }

    public function destroy($id)
    {
        $data = Transaksi::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Layanan berhasil dihapus',
        ]);
    }

    public function addListTransaksi()
    {
        $data = Layanan::findOrFail(request()->layanan_id);
        $items = [
            'layanan_id' => request()->layanan_id,
            'nama_layanan' => $data->nama,
            'berat' => request()->berat,
            'total_bayar' => $data->harga * request()->berat,
        ];

        return response()->json([
            'status' => 'success',
            'message' => 'Layanan berhasil ditambahkan',
            'data' => $items,
        ]);
    }

    public function getGrandTotal()
    {
        $total = 0;
        foreach(request()->items as $item){
            $total += $item['total_bayar'];
        }
        return $total;
    }
}
