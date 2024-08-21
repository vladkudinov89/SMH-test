<?php

namespace App\Services\Parse\Interfaces;

use App\Domain\Parse\DTO\ParseData;
use App\Domain\Product\DTO\AddProductData;
use App\Domain\Product\Models\Product;

interface ParseServiceInterface
{
    public function getContent(ParseData $data): array;

    public function setProduct(AddProductData $data): array;
}
