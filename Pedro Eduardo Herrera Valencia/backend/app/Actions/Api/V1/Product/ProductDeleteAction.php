<?php

namespace App\Actions\Api\V1\Product;

use App\Models\Api\V1\Product\Product;

    /**
     * Maneja la eliminacion de un nuevo producto.
     *
     * Esta función elimina un nuevo producto en la base de datos utilizando los datos proporcionados.
     *
     * @param Product $product Los datos del producto a eliminar.
     * @return void
     */
    class ProductDeleteAction
    {
        public function handle(Product $product): void
        {
            $product->delete();
        }
    }
