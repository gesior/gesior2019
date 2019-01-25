<?php

namespace App\Form\Account;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePublicInformationType extends AbstractType
{
    public function __construct(\Twig_Environment $environment)
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('realName', TextType::class, [
                'label' => 'ACCOUNT.CHANGE_PUBLIC_INFORMATION.REAL_NAME',
                'attr' => ['autocomplete' => 'off'], 'required' => false, 'empty_data' => ''
            ])
            ->add('location', TextType::class, [
                'label' => 'ACCOUNT.CHANGE_PUBLIC_INFORMATION.LOCATION',
                'attr' => ['autocomplete' => 'off'], 'required' => false, 'empty_data' => ''
            ])
            ->add('flag', ChoiceType::class, [
                'label' => 'ACCOUNT.CHANGE_PUBLIC_INFORMATION.COUNTRY',
                'choices' => ['Ukraine' => 'ua', 'Poland' => 'pl', 'Germany' => 'de', 'Brazil' => 'br']
            ])
            ->add('changePassword', SubmitType::class, [
                'label' => 'ACCOUNT.CHANGE_PUBLIC_INFORMATION.SAVE_CHANGES'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => true
        ]);
    }
}
