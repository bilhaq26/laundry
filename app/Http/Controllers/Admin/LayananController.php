<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\LayananResource;
use App\Models\Layanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $data = Layanan::paginate(10);
        return LayananResource::collection($data);
    }

    public function show($id)
    {
        $data = Layanan::find($id);
        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $data->id,
                'nama' => $data->nama,
                'durasi' => $data->durasi,
                'harga' => $data->harga,
                'created_at' => Carbon::parse($data->created_at)->isoFormat('dddd, DD MMMM Y'),
                'updated_at' => Carbon::parse($data->updated_at)->isoFormat('dddd, DD MMMM Y'),
            ]
        ]);
    }

    public function search($param)
    {
        $data = Layanan::where('nama', 'like', '%' . $param . '%')->paginate(10);
        return LayananResource::collection($data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|string',
            'durasi' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        if($validate){
            $data = new Layanan();
            $data->nama = $request->nama;
            $data->durasi = $request->durasi;
            $data->harga = $request->harga;
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Data Pelanggan Berhasil Disimpan',
                'data' => [
                    'id' => $data->id,
                    'nama' => request()->nama,
                    'durasi' => request()->durasi,
                    'harga' => request()->harga,
                    'created_at' => Carbon::parse($data->created_at)->isoFormat('dddd, DD MMMM Y'),
                    'updated_at' => Carbon::parse($data->updated_at)->isoFormat('dddd, DD MMMM Y'),
                ]
            ], 201);

        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required|string',
            'durasi' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        if($validate){
            $data = Layanan::find($id);
            $data->nama = $request->nama;
            $data->durasi = $request->durasi;
            $data->harga = $request->harga;
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Data Pelanggan Berhasil Diupdate',
                'data' => [
                    'id' => $data->id,
                    'nama' => request()->nama,
                    'durasi' => request()->durasi,
                    'harga' => request()->harga,
                    'created_at' => Carbon::parse($data->created_at)->isoFormat('dddd, DD MMMM Y'),
                    'updated_at' => Carbon::parse($data->updated_at)->isoFormat('dddd, DD MMMM Y'),
                ]
            ], 201);

        }
    }

    public function destroy($id)
    {
        $data = Layanan::find($id);
        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
