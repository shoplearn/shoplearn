<?php

declare(strict_types=1);

namespace App\Domain\Model;

final class Price
{
    private $value;
    private $currency;
    
    public function __construct(int $value, string $currency)
    {
        $this->value = $value;
        $this->currency = $currency;
    }
    
    public function equals(Price $price): bool
    {
        return $this->getValue() === $price->getValue() && $this->getCurrency() === $price->getCurrency();
    }
    
    public function add(Price $toAdd): self
    {
        if ($this->getCurrency() !== $toAdd->getCurrency()) {
            throw new InvalidArgumentException('You can only add money with the same currency');
        }
        
        return new static($this->getValue() + $toAdd->getValue(), $this->getCurrency());
    }
    
    public function subtract(Price $toSubtract): self
    {
        if ($this->getCurrency() !== $toSubtract->getCurrency()) {
            throw new InvalidArgumentException('You can only subtract money with the same currency');
        }
        
        return new static($this->getValue() - $toSubtract->getValue(), $this->getCurrency());
    }
    
    public function getValue(): int
    {
        return $this->value;
    }
    
    public function getCurrency(): string
    {
        return $this->currency;
    }
}