<?php

namespace App\Form;

use App\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
            'label' => 'Prénom et Nom *',
            'label_attr' => ['class' => 'text-light'],
            'attr' => ['placeholder' => 'Votre nom complet', 'class' => 'text-center']
            ])
            ->add('email', TextType::class, [
                'label' =>'E-mail *',
                'label_attr' => ['class'=>'text-light'],
                'attr' => ['placeholder' => 'Entrez votre e-mail', 'class' => 'text-center']
            ])
            ->add('subject', TextType::class, [
            'label' => 'Sujet *',
            'label_attr' => ['class' => 'text-light'],
            'attr' => ['placeholder' => 'Le sujet de votre email', 'class' => 'text-center']
            ])
            ->add('message', TextareaType::class, [
            'label' => 'Message *',
            'label_attr' => ['class' => 'text-light'],
            'attr' => ['placeholder' => 'Le contenu de votre message', 'class' => 'text-center']
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
        ]);
    }
}
