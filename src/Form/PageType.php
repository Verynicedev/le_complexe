<?php

namespace App\Form;

use App\Entity\Tag;
use App\Entity\Page;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('imageFile',VichImageType::class,["required"=>false])
            // ->add('updatedAt')
            // ->add('category')
            // ->add('tags')
            ->add('category', EntityType::class, [
                'label' => 'Catégories',
                'class'=> Category::class,
                'choice_label' => 'title', /*'expanded' => true,*/
                'placeholder' => '-- Choisir une catégorie --',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.title', 'ASC');
                },
            ])
            ->add('tags', EntityType::class, [
                'label' => 'Tags',
                'class'=> Tag::class,
                'choice_label' => 'title', 
                'expanded' => true,
                'multiple' => true,
                'placeholder' => '-- Choisir un tag --',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.title', 'ASC');
                },
            ])
            ->add('submit',SubmitType::class, [
                'label' =>'Valider',
                'attr' =>['class' => 'btn btn-primary btn-block',]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Page::class,
        ]);
    }
}
