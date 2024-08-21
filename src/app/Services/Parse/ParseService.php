<?php

namespace App\Services\Parse;

use App\Domain\Parse\DTO\ParseData;
use App\Domain\Product\DTO\AddProductData;
use App\Services\Parse\Interfaces\ParseServiceInterface;
use Illuminate\Support\Facades\Http;

class ParseService implements ParseServiceInterface
{
    /**
     * @var string
     */
    private string $url = 'https://dummyjson.com';

    /**
     * @param ParseData $data
     * @return array
     */
    public function getContent(ParseData $data): array
    {
        $result = [];
        $type = $data->getParseTypeName();
        $keyword = $data->getKeyword();

        if ($data->getKeyword()) {
            $response = Http::get("$this->url/$type/search?q=$keyword");
        } else {
            $response = Http::get($this->url . '/' . $type);
        }

        if ($response->status() === 200) {
            $result = $response->json()[$type];
        }

        return $result;
    }

    /**
     * @param AddProductData $data
     * @return array
     */
    public function setProduct(AddProductData $data): array
    {
        $result = [];

        $response = Http::post("$this->url/products/add", [
            'title' => $data->getTitle(),
        ]);

        if ($response->successful()) {
            $result = $response->json();
        }

        return $result;
    }
}
