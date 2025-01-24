<?php

namespace App\Actions\Api\V1\Product;

use App\Http\Requests\Api\V1\Product\ProductRequest;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\V1\Product\Product;

class ProductStoreAction
{
    /**
     * Maneja la creación de un nuevo producto.
     *
     * Esta función crea un nuevo producto en la base de datos utilizando los datos proporcionados.
     *
     * @param ProductRequest $request Los datos del producto a crear.
     * @return Product El modelo del producto creado.
     */
    public function handle(ProductRequest $request): Model
    {
        $data = $request->validated();
        return Product::create($data);
    }
}
