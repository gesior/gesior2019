<?php

namespace App\Form\Account;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TwoFactorAuthenticationEnableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('currentPassword', PasswordType::class, [
                'label' => 'ACCOUNT.ENABLE_2FA.CURRENT_PASSWORD',
                'attr' => [
                    'autocomplete' => 'account-password',
                ],
            ])
            ->add('recoveryKey', TextType::class, [
                'label' => 'ACCOUNT.ENABLE_2FA.RECOVERY_KEY',
                'attr' => [
                    'autocomplete' => 'off',
                ],
            ])
            ->add('enable2FA', SubmitType::class, [
                'label' => 'ACCOUNT.ENABLE_2FA.ENABLE_BUTTON',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => true,
        ]);
    }
}
