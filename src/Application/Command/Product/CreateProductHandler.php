<?php

declare(strict_types=1);

namespace App\Application\Command\Product;

use App\Domain\Factory\CategoryFactory;
use App\Domain\Factory\ProductFactory;
use App\Domain\Model\ProductRepository;

final class CreateProductHandler
{
    private $productRepository;
    
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    
    public function __invoke(CreateProductCommand $command)
    {
        $payload = $command->payload();
        
        $category = CategoryFactory::create($payload['category']);
        
        $product = ProductFactory::create($category, $payload['name'], (int)$payload['price'], $payload['currency']);
        
        $this->productRepository->add($product);
    }
}