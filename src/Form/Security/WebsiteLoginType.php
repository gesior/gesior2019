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
            ->add('name', TextType::class, ['label' => 'LOGIN_ACCOUNT_NAME'])
            ->add('password', PasswordType::class, ['label' => 'LOGIN_ACCOUNT_PASSWORD'])
            ->add('remember_me', CheckboxType::class, ['required' => false, 'label' => 'LOGIN_REMEMBER_ME'])
            ->add('login', SubmitType::class, ['label' => 'LOGIN_DO_LOGIN_BUTTON'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id'   => 'authenticate',
        ]);
    }
}
