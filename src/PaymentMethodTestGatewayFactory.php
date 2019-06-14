<?php

declare(strict_types=1);

namespace Audax\SyliusPaymentMethodTestPlugin;

use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\GatewayFactory;

final class PaymentMethodTestGatewayFactory extends GatewayFactory
{
    protected function populateConfig(ArrayObject $config): void
    {
        $config->defaults(
            [
                'payum.factory_name' => 'payment_method_test',
                'payum.factory_title' => 'Payment Method Test',
            ]
        );
        if (false === (bool) $config['payum.api']) {
            $config['payum.default_options'] = [
                'environment' => '',
                'email' => '',
                'token' => '',
                'log' => false,
                'log_path' => false,
            ];
            $config->defaults($config['payum.default_options']);
            $config['payum.required_options'] = ['environment', 'email', 'token', 'log', 'log_path'];
            $config['payum.api'] = static function (ArrayObject $config): array {
                $config->validateNotEmpty($config['payum.required_options']);
                return [
                    'environment' => $config['environment'],
                    'email' => $config['email'],
                    'token' => $config['token'],
                    'log' => $config['log'],
                    'log_path' => $config['log_path'],
                ];
            };
        }
    }
}
