<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\CategoryMenu;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('image')
            ->add('prix')
            ->add('category', EntityType::class,[
                'class'=> CategoryMenu::class,
                'choice_label'=>'nom',
                // 'expanded'=> 'true',
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
            'data_class' => Menu::class,
        ]);
    }
}
