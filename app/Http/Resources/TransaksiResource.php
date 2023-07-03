<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Author' => $this->User->username ?? 'Tidak ada Author',
            'pelanggan' => $this->Konsumen->nama,
            'keterangan' => $this->keterangan,
            'status_bayar' => $this->status_bayar,
            'status_ambil' => $this->status_ambil,
            'total_bayar' => 'Rp.' . number_format($this->total_bayar, 0, ',', '.'),
            'tanggal_diterima' => Carbon::parse($this->tanggal_diterima)->isoFormat('dddd, DD MMMM Y'),
        ];
    }
}
