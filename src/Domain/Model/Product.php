<?php

declare(strict_types=1);

namespace App\Domain\Model;

final class Product
{
    private $id;
    private $name;
    private $price;
    private $category;
    
    public function __construct(
        ProductId $id,
        Category $category,
        string $name,
        Price $price
    ) {
        $this->id = $id;
        $this->category = $category;
        $this->name = $name;
        $this->price = $price;
    }
    
    public function getPrice(): Price
    {
        return $this->price;
    }
}