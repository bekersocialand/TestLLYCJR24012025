<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Requests\Api\V1\Product\ProductRequest;
use App\Actions\Api\V1\Product\ProductStoreAction;
use App\Models\Api\V1\Product\Product;
use App\Http\Controllers\ApiController;
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
     */
    public function index(Request $request)
    {
        $products = Product::select(['id', 'nombre', 'precio', 'created_at', 'updated_at'])
                        ->paginate($request->per_page);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    /**
     * Crea un nuevo producto.
     *
     * Esta función maneja la creación de un nuevo producto.
     *
     * @param ProductRequest $request La solicitud de producto.
     * @param ProductStoreAction $action La acción de almacenamiento del producto.
     */
    public function store(ProductRequest $request, ProductStoreAction $action)
    {
        $action->handle($request);

        // Redirigir al listado de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

}
