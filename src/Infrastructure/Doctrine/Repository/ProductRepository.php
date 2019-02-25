<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Repository;

use App\Domain\Model\Product;
use App\Domain\Model\ProductRepository as ProductRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

final class ProductRepository extends ServiceEntityRepository implements ProductRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }
    
    public function add(Product $product): void
    {
        $this->_em->persist($product);
        $this->_em->flush();
    }
}