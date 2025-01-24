<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Resources\Api\V1\Product\ProductResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Requests\Api\V1\Product\ProductRequest;
use App\Actions\Api\V1\Product\ProductUpdateAction;
use App\Actions\Api\V1\Product\ProductDeleteAction;
use App\Actions\Api\V1\Product\ProductStoreAction;
use App\Models\Api\V1\Product\Product;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    /**
     * Lista los productos.
     *
     * Esta función enlista los productos.
     *
     * @param Request $request La solicitud HTTP.
     * @return ResourceCollection Una colección de recursos de productos.
     */
    public function index(Request $request): ResourceCollection
    {
        $product = Product::select(['id', 'nombre', 'precio', 'created_at', 'updated_at'])
                        ->paginate($request->per_page);

        return ProductResource::collection($product);
    }

    /**
     * Crea un nuevo producto.
     *
     * Esta función maneja la creación de un nuevo producto.
     *
     * @param ProductRequest $request La solicitud de producto.
     * @param ProductStoreAction $action La acción de almacenamiento del producto.
     * @return JsonResponse Una respuesta JSON indicando el éxito de la operación.
     */
    public function store(ProductRequest $request, ProductStoreAction $action): JsonResponse
    {
        return DB::transaction(function () use ($request, $action) {
            $action->handle($request);
            return $this->ok(message: 'El producto se ha creado correctamente');
        });
    }

    /**
     * Muestra los detalles de un producto.
     *
     * Esta función recupera y muestra los detalles de un producto específico.
     *
     * @param string $hash_id El ID cifrado del producto.
     * @return ProductResource Detalles del producto.
     */
    public function show(string $hash_id): ProductResource
    {
        return new ProductResource(Product::findOrFail(decrypt($hash_id)));
    }

    /**
     * Actualiza un producto.
     *
     * Esta función maneja la actualización de un producto específico.
     *
     * @param ProductRequest $request La solicitud de actualización de producto.
     * @param string $hashId El ID cifrado del producto.
     * @param ProductUpdateAction $action La acción de actualización.
     * @return ProductResource Detalles del producto actualizados.
     */
    public function update(ProductRequest $request, string $hashId, ProductUpdateAction $action): ProductResource
    {
        return DB::transaction(function () use ($request, $hashId, $action) {
            $catalog = $action->handle($request, $hashId);

            return new ProductResource($catalog);
        });
    }

    /**
     * Elimina un producto.
     *
     * Esta función maneja la eliminación de un producto.
     *
     * @param Product $product El producto a eliminar.
     * @param ProductDeleteAction $action La acción de eliminación.
     * @return JsonResponse Una respuesta JSON indicando el éxito de la operación.
     */
    public function destroy(Product $product, ProductDeleteAction $action): JsonResponse
    {
        return DB::transaction(function () use ($product, $action) {
            $action->handle(product: $product);
            return $this->ok('El producto se ha eliminado correctamente');
        });
    }
}
