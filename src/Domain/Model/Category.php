<?php

declare(strict_types=1);

namespace App\Domain\Model;

final class Category
{
    private $id;
    private $name;
    private $products = [];
    
    public function __construct(CategoryId $categoryId, string $name, array $products)
    {
        $this->id = $categoryId;
        $this->name = $name;
        $this->products = $products;
    }
    
    public function getProducts(): array
    {
        return $this->products;
    }
    
    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }
    
    public function removeProduct(Product $product): void
    {
        if (($key = \array_search($product, $this->products)) !== false) {
            unset($this->products[$key]);
        }
    }
}