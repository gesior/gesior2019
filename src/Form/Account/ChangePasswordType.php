<?php

namespace App\Form\Account;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('currentPassword', PasswordType::class, [
                'label' => 'ACCOUNT.CHANGE_PASSWORD.CURRENT_PASSWORD',
                'attr' => [
                    'autocomplete' => 'account-password',
                ],
            ])
            ->add('newPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'ACCOUNT.CHANGE_PASSWORD.NEW_PASSWORDS_DO_NOT_MATCH.',
                'required' => true,
                'first_options' => [
                    'label' => 'ACCOUNT.CHANGE_PASSWORD.NEW_PASSWORD',
                ],
                'second_options' => [
                    'label' => 'ACCOUNT.CHANGE_PASSWORD.NEW_PASSWORD_REPEAT',
                ],
            ])
            ->add('changePassword', SubmitType::class, [
                'label' => 'ACCOUNT.CHANGE_PASSWORD.CHANGE_PASSWORD_BUTTON',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => true,
        ]);
    }
}
