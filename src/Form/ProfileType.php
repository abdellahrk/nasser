<?php

namespace App\Form;

use App\Entity\Profile;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'mapped' => false,
                'label' => 'Code Switf',
                'attr' => [
                    'class' => 'form-control',
                    
                ]
            ])
            ->add('email', EmailType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('fullname', TextType::class, [
                'label' => 'Nom complet',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('AccountNumber', IntegerType::class, [
                'label' => 'Numéro compte',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('country', CountryType::class, [
                'label' => 'Pays',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('address', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('iban', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('swift', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('balance', IntegerType::class, [
                'label' => 'Montant',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]

            ])
            ->add('motif', CKEditorType::class, [
                'attr' => [
                    'class' => 'form-control '
                ]
            ])
            ->add('autres', CKEditorType::class, [
                'attr' => [
                    'class' => 'form-control '
                ]
            ])
            ->add('currency', CurrencyType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('documents', FileType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'mapped' => false,
                'multiple' => true,
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profile::class,
        ]);
    }
}
