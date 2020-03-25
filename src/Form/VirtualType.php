<?php

namespace App\Form;

use App\Entity\Virtual;
use App\Entity\TagVirtual;
use App\Entity\CategoryVirtual;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VirtualType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('category', EntityType::class,[
                'class'=> CategoryVirtual::class,
                'choice_label'=>'nom',
                // 'expanded'=> 'true',
                'placeholder'=>'--|====> Choisir une catégorie  <====|--',
                'query_builder' => function (EntityRepository $er){
                    return $er->createQueryBuilder('c')
                            ->orderBy('c.nom','ASC');
                },
                ])
            ->add('tag', EntityType::class,[
                'class'=> TagVirtual::class,
                'choice_label'=>'nom',
                'expanded'=> true,
                'multiple'=> true,
                'placeholder'=>'--|====> Choisir un tag  <====|--',
                'query_builder' => function (EntityRepository $er){
                    return $er->createQueryBuilder('t')
                            ->orderBy('t.nom','ASC');
                },
                ])
            ->add('description')
            ->add('image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Virtual::class,
        ]);
    }
}
