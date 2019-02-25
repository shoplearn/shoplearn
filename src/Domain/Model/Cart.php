<?php

declare(strict_types=1);

namespace App\Domain\Model;

final class Cart
{
    private $id;
    private $price;
    private $products;
    
    public function __construct(CartId $cartId, Price $price, array $products = [])
    {
        $this->id = $cartId;
        $this->price = $price;
        $this->products = $products;
    }
    
    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
        $this->price = $this->price->add($product->getPrice());
    }
    
    public function removeProduct(Product $product): void
    {
        if (($key = \array_search($product, $this->products)) !== false) {
            unset($this->products[$key]);
            $this->price = $this->price->subtract($product->getPrice());
        }
    }
    
    public function getPrice(): Price
    {
        return $this->price;
    }
}