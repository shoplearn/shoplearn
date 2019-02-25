<?php

declare(strict_types=1);

namespace App\Domain\Model;

interface ProductRepository
{
    public function add(Product $product): void;
}