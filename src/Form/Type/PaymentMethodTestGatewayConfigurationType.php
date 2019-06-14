<?php

namespace Audax\SyliusPaymentMethodTestPlugin\Form\Type;

use Sylius\Bundle\GridBundle\Form\Type\Filter\BooleanFilterType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class PaymentMethodTestGatewayConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('environment', ChoiceType::class, [
                'choices' => [
                    'audax.payment_method_type_plugin.secure' => 'secure',
                    'audax.payment_method_type_plugin.sandbox' => 'sandbox',
                ],
                'label' => 'audax.payment_method_type_plugin.environment',
            ])
            ->add('token', TextType::class, [
                'label' => 'audax.payment_method_type_plugin.token',
                'constraints' => [
                    new NotBlank([
                        'message' => 'audax.payment_method_type_plugin.gateway_configuration.token.not_blank',
                        'groups' => ['sylius'],
                    ]),
                    new Length([
                        'minMessage' => 'audax.payment_method_type_plugin.gateway_configuration.token.not_blank',
                        'groups' => ['sylius'],
                        'min' => 32,
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'audax.payment_method_type_plugin.email',
                'constraints' => [
                    new NotBlank([
                        'message' => 'audax.payment_method_type_plugin.gateway_configuration.email.not_blank',
                        'groups' => ['sylius'],
                    ])
                ],
            ])
            ->add('log', BooleanFilterType::class, [
                'label' => 'audax.payment_method_type_plugin.log',
            ])
            ->add('log_path', TextType::class, [
                'required' => false,
                'label' => 'audax.payment_method_type_plugin.log_path',
            ]);


    }
}