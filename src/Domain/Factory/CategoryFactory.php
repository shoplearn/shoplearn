<?php

declare(strict_types=1);

namespace App\Domain\Factory;

use App\Domain\Model\Category;
use App\Domain\Model\CategoryId;

class CategoryFactory
{
    public static function create(string $name): Category
    {
        return new Category(CategoryId::next(), $name, []);
    }
}