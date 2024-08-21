<?php

namespace App\Http\Controllers\Product;

use App\Domain\Product\Actions\ProductAction;
use App\Domain\Product\DTO\AddProductData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;

class ProductController extends Controller
{
    /**
     * @param ProductRequest $request
     * @return void
     */
    public function addProduct(ProductRequest $request): void
    {
        try {
            (new ProductAction())->addProductFromParseAction(
                new AddProductData($request->get('title'))
            );
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage() . "\n" . $th->getFile() . ":" . $th->getLine() . "\n" . $th->getTraceAsString());
        }
    }
}
