<?php

namespace App\Domain\Product\DTO;

use App\Domain\Category\Models\Category;

class ProductData
{
    private string $title;
    private string $description;
    private int $stock;
    private array $images;
    private Category $category;
    private float $discount_percentage;
    private float $rating;
    private string $thumbnail;
    private float $price;

    public function __construct(
        string   $title,
        string   $description,
        int      $stock,
        array    $images,
        Category $category,
        float    $discount_percentage,
        float    $rating,
        string   $thumbnail,
        float    $price
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->stock = $stock;
        $this->images = $images;
        $this->category = $category;
        $this->discount_percentage = $discount_percentage;
        $this->rating = $rating;
        $this->thumbnail = $thumbnail;
        $this->price = $price;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getDiscountPercentage(): float
    {
        return $this->discount_percentage;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getImages(): array
    {
        return $this->images;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
