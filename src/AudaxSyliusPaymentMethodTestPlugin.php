<?php

declare(strict_types=1);

namespace Audax\SyliusPaymentMethodTestPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class AudaxSyliusPaymentMethodTestPlugin extends Bundle
{
    use SyliusPluginTrait;
}
