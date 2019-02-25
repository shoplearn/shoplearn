<?php

declare(strict_types=1);

namespace App\Domain\Factory;

use App\Domain\Model\Category;
use App\Domain\Model\Price;
use App\Domain\Model\Product;
use App\Domain\Model\ProductId;

class ProductFactory
{
    public static function create(Category $category, string $name, int $priceValue, string $priceCurrency): Product
    {
        return new Product(ProductId::next(), $category, $name, new Price($priceValue, $priceCurrency));
    }
}