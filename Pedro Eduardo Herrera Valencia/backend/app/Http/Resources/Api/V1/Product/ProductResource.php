<?php

namespace App\Http\Resources\Api\V1\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'type' => 'product',
            'id' => $this->hash_id,
            'attributes' => [
                'nombre'            =>  $this->nombre,
                'precio'            =>  $this->precio,
                'created_at'        =>  $this->created_at,
                'updated_at'        =>  $this->updated_at
            ],
            'relationships' => [
                //
            ],
        ];
    }
}
