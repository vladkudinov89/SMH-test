<?php

namespace App\Domain\Product\Actions;

use App\Domain\Product\DTO\AddProductData;
use App\Domain\Product\DTO\ProductData;
use App\Domain\Product\Models\Product;
use App\Services\Parse\ParseService;

class ProductAction
{
    /**
     * @param ProductData $data
     * @return Product
     */
    public function addProduct(ProductData $data): Product
    {
        return Product::create([
            'title' => $data->getTitle(),
            'description' => $data->getDescription(),
            'rating' => $data->getRating(),
            'images' => $data->getImages(),
            'price' => $data->getPrice(),
            'thumbnail' => $data->getThumbnail(),
            'discount_percentage' => $data->getDiscountPercentage(),
            'stock' => $data->getStock(),
            'category_id' => $data->getCategory()->id,
        ]);
    }

    /**
     * @param AddProductData $data
     * @return void
     */
    public function addProductFromParseAction(AddProductData $data): void
    {
        (new ParseService())->setProduct($data);
    }
}
