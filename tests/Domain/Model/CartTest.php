<?php

declare(strict_types=1);

namespace App\Tests\Domain\Entity;

use App\Domain\Model\Cart;
use App\Domain\Model\CartId;
use App\Domain\Model\Category;
use App\Domain\Model\CategoryId;
use App\Domain\Model\Price;
use App\Domain\Model\Product;
use App\Domain\Model\ProductId;
use PHPUnit\Framework\TestCase;

final class CartTest extends TestCase
{
    private $category;
    private $productTv;
    private $productRadio;
    private $cart;
    
    public function setUp()
    {
        $this->category = new Category(CategoryId::next(), 'Electronics', []);
        
        $this->productTv = new Product(ProductId::next(), $this->category, 'TV', new Price(120000, 'PLN'));
        $this->productRadio = new Product(ProductId::next(), $this->category, 'Radio', new Price(9000, 'PLN'));
        $this->cart = new Cart(CartId::next(), new Price(0, 'PLN'));
    }
    
    public function testAddProductsToCart()
    {
        $this->cart->addProduct($this->productTv);
        $this->assertSame(120000, $this->cart->getPrice()->getValue());
        
        $this->cart->addProduct($this->productRadio);
        $this->assertSame(129000, $this->cart->getPrice()->getValue());
    }
    
    public function testRemoveProductsFromCart()
    {
        $this->cart->addProduct($this->productTv);
        $this->cart->addProduct($this->productRadio);
        
        $this->cart->removeProduct($this->productTv);
        $this->assertSame(9000, $this->cart->getPrice()->getValue());
        
        $this->cart->removeProduct($this->productRadio);        
        $this->assertSame(0, $this->cart->getPrice()->getValue());
    }
}