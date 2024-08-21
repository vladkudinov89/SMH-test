<?php

namespace App\Domain\Parse\Actions;

use App\Domain\Category\Models\Category;
use App\Domain\Parse\DTO\ParseData;
use App\Domain\Product\Actions\ProductAction;
use App\Domain\Product\DTO\ProductData;
use App\Domain\Product\Models\Product;
use App\Services\Parse\ParseService;
use Illuminate\Support\Str;

final class ParseAction
{
    /**
     * @param ParseData $data
     * @return void
     */
    public function parseAction(ParseData $data): void
    {
        $contents = (new ParseService())->getContent(
            new ParseData($data->getParseTypeName(), $data->getKeyword())
        );

        if ($contents) {
            foreach ($contents as $content) {
                switch ($data->getParseTypeName()) {
                    case Product::MODEL_NAME:
                        $this->parseProduct($content, $data->getKeyword());
                        break;
                    default:
                        break;
                }
            }
        }
    }

    /**
     * @param array $product
     * @param string|null $keyword
     * @return void
     */
    private function parseProduct(array $product, ?string $keyword = null): void
    {
        if (Str::contains($product['title'], $keyword) || !$keyword) {

            /** @var Category $category */
            $category = Category::firstOrCreate(
                ["name" => $product['category']],
                ["name" => $product['category']]
            );

            (new ProductAction())->addProduct(new ProductData(
                $product['title'],
                $product['description'],
                $product['stock'],
                $product['images'],
                $category,
                $product['discountPercentage'],
                $product['rating'],
                $product['thumbnail'],
                $product['price']
            ));
        }
    }
}
