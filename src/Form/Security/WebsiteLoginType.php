<?php

namespace App\Form\Security;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WebsiteLoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'SECURITY.LOGIN.ACCOUNT_NAME',
                'attr' => [
                    'autocomplete' => 'account-name',
                ],
            ])
            ->add('password', PasswordType::class, [
                'label' => 'SECURITY.LOGIN.ACCOUNT_PASSWORD',
                'attr' => [
                    'autocomplete' => 'account-password',
                ],
            ])
            ->add('secure_token', TextType::class, [
                'required' => false,
                'label' => 'SECURITY.LOGIN.ACCOUNT_SECURE_TOKEN',
                'disabled' => true,
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'SECURITY.LOGIN.TOKEN_REQUIRES_ACCOUNT_NAME',
                ],
            ])
            ->add('remember_me', CheckboxType::class, [
                'required' => false,
                'label' => 'SECURITY.LOGIN.REMEMBER_ME',
            ])
            ->add('login', SubmitType::class, [
                'label' => 'SECURITY.LOGIN.LOGIN_BUTTON',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'authenticate',
        ]);
    }
}
