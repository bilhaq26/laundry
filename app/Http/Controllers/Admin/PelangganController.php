<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\PelangganResource;
use App\Models\Konsumen;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $data = Konsumen::paginate(10);
        // pelanggan resource
        return PelangganResource::collection($data);
    }

    public function show($id)
    {
        $data = Konsumen::whereId($id)->first();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Pelanggan',
                'data' => [
                    'id' => $data->id,
                    'nama' => $data->nama,
                    'user_id' => auth()->user()->username,
                    'created_at' => $data->created_at->isoFormat('dddd, DD MMMM YYYY, HH:mm:ss'),
                    'updated_at' => $data->updated_at->isoFormat('dddd, DD MMMM YYYY, HH:mm:ss'),
                ]
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Pelanggan Tidak Ditemukan',
                'data' => ''
            ], 404);
        }
    }

    public function search($param)
    {
        $data = Konsumen::where('nama', 'like', '%' . $param . '%')->paginate(10);
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Hasil Pencarian Pelanggan',
                'data' => [
                    'id' => $data->id,
                    'nama' => $data->nama,
                    'user_id' => auth()->user()->username,
                    'created_at' => $data->created_at->isoFormat('dddd, DD MMMM YYYY, HH:mm:ss'),
                    'updated_at' => $data->updated_at->isoFormat('dddd, DD MMMM YYYY, HH:mm:ss'),
                ]
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Pelanggan Tidak Ditemukan',
                'data' => ''
            ], 404);
        }
    }

    public function store()
    {
        $validate = request()->validate([
            'nama' => 'required',
        ]);

        if ($validate) {
            $data = new Konsumen();
            $data->nama = request()->nama;
            $data->user_id = auth()->user()->id;
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Data Pelanggan Berhasil Disimpan',
                'data' => [
                    'id' => $data->id,
                    'nama' => request()->nama,
                    'user_id' => auth()->user()->username,
                ]
            ], 201);
        }
    }

    public function update($id)
    {
        $validate = request()->validate([
            'nama' => 'required',
        ]);

        if ($validate) {
            $data = Konsumen::whereId($id)->first();
            $data->nama = request()->nama;
            $data->user_id = auth()->user()->id;
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Data Pelanggan Berhasil Diupdate',
                'data' => [
                    'id' => $data->id,
                    'nama' => request()->nama,
                    'user_id' => auth()->user()->username,
                ]
            ], 201);
        }
    }

    public function destroy(Request $request, $id)
    {
        $data = Konsumen::where('id',$request->id)->first();
        $data->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Pelanggan Berhasil Dihapus',
            'data' => [
                'id' => $data->id,
                'nama' => $data->nama,
                'user_id' => auth()->user()->username,
            ]
        ], 201);


    }


}
