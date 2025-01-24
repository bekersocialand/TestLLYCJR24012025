<?php

namespace App\Actions\Api\V1\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\Api\V1\Product\Product;
use Illuminate\Http\Request;

class ProductUpdateAction
{
    /**
     * Actualiza el registro que coincida con el id de la tabla
     *
     * @param Request $request
     * @param string $hashId
     * @return Model
     */
    public function handle(Request $request, string $hashId): Model
    {
        $data = $request->validated();
        $response = Product::findOrFail(decrypt($hashId));
        $response->update($data);

        return $response;
    }
}
