<?php

declare(strict_types=1);

namespace App\Application\Command\Product;

use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;

final class CreateProductCommand extends Command implements PayloadConstructable
{
    use PayloadTrait;
}
