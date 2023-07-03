<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class LayananResource extends JsonResource
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
                'nama' => $this->nama,
                'durasi' => $this->durasi,
                'harga' => 'Rp.' . number_format($this->harga, 0, ',', '.'),
                'created_at' => Carbon::parse($this->created_at)->isoFormat('dddd, DD MMMM Y'),
                'updated_at' => Carbon::parse($this->updated_at)->isoFormat('dddd, DD MMMM Y'),
        ];
    }
}
