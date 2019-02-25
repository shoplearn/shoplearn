<?php

declare(strict_types=1);

namespace App\Domain\Model;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

trait IdTrait
{
    private $abstractId;
    
    public function __construct(UuidInterface $abstractId)
    {
        $this->abstractId = $abstractId;
    }
    
    public static function fromString(string $id): self
    {
        return new static(Uuid::fromString($id));
    }
    
    public static function next(): self
    {
        return new static(Uuid::uuid4());
    }
    
    public function __toString(): string
    {
        return $this->abstractId->toString();
    }
}