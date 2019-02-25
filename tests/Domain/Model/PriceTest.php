<?php

declare(strict_types=1);

namespace App\Tests\Domain\Model;

use App\Domain\Model\Price;
use PHPUnit\Framework\TestCase;

final class PriceTest extends TestCase
{
    private $price500;
    private $price1000;
    
    public function setUp()
    {
        $this->price500 = new Price(500, 'PLN');
        $this->price1000 = new Price(1000, 'PLN');
    }
    
    public function testEquals()
    {
        $this->assertTrue($this->price500->equals($this->price500));
        $this->assertFalse($this->price500->equals($this->price1000));
    }
    
    public function testAdd()
    {
        $addition = $this->price500->add($this->price500);
        
        $this->assertSame($addition->getValue(), 1000);
    }
    
    public function testSubtract()
    {
        $addition = $this->price1000->subtract($this->price500);
        
        $this->assertSame($addition->getValue(), 500);
    }
}