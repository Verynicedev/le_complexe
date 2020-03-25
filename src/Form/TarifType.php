<?php

namespace App\Form;

use App\Entity\Tarif;
use App\Entity\CategoryTarif;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TarifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('prix1')
            ->add('prix2')
            ->add('prix3')
            ->add('category', EntityType::class,[
                'class'=> CategoryTarif::class,
                'choice_label'=>'nom',
                // 'expanded'=> 'true',
                'placeholder'=>'--|====> Choisir une catégorie  <====|--',
                'query_builder' => function (EntityRepository $er){
                    return $er->createQueryBuilder('c')
                            ->orderBy('c.nom','ASC');
                },
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tarif::class,
        ]);
    }
}
