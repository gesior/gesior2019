<?php

namespace App\Form\Account\Character;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditInformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hideChar', ChoiceType::class, [
                'label' => 'ACCOUNT.CHARACTER.EDIT_INFORMATION.HIDE_CHARACTER',
                'choices' => ['No' => 0, 'Yes' => 1]
            ])
            ->add('comment', TextareaType::class, [
                'label' => 'ACCOUNT.CHARACTER.EDIT_INFORMATION.COMMENT',
                'attr' => ['autocomplete' => 'off'], 'required' => false, 'empty_data' => ''
            ])
            ->add('saveChanges', SubmitType::class, [
                'label' => 'ACCOUNT.CHARACTER.EDIT_INFORMATION.SAVE_CHANGES'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => true
        ]);
    }
}
