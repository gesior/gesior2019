<?php

namespace App\Form\Types;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VocationPickerType extends AbstractType
{
    /*
        private $playerService;
        public function __construct(PlayerService $playerService)
        {
            $this->playerService = $playerService;
        }
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('name', TextType::class, ['label' => 'PLAYER.CREATE.NAME',
                    'attr' => ['autocomplete' => 'off']])
                ->add('sex', ChoiceType::class, [
                    'label' => 'PLAYER.CREATE.SEX',
                    'choices' => [
                        'PLAYER.SEX_MALE' => PlayerService::SEX_MALE,
                        'PLAYER.SEX_FEMALE' => PlayerService::SEX_FEMALE
                    ],
                    'expanded' => true
                ])
                ->add('vocationId', ChoiceType::class, [
                    'label' => 'PLAYER.CREATE.VOCATION',
                    'choices' => array_flip($this->playerService->getNewCharacterVocations()),
                    'expanded' => true
                ])
                ->add('townId', ChoiceType::class, [
                    'label' => 'PLAYER.CREATE.TOWN',
                    'choices' => array_flip($this->playerService->getNewCharacterTowns()),
                    'expanded' => true
                ])
                ->add('doCreate', SubmitType::class, [
                    'label' => 'PLAYER.CREATE.DO_CREATE'
                ]);;
        }
    */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => true
        ]);
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}
