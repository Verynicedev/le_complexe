<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_1 = 'category-1';
    public const CATEGORY_2 = 'category-2';
    public const CATEGORY_3 = 'category-3';
    public const CATEGORY_4 = 'category-4';
    public const CATEGORY_5 = 'category-5';
    public const CATEGORY_6 = 'category-6';
    public const CATEGORY_7 = 'category-7';
    public const CATEGORY_8 = 'category-8';
    public const CATEGORY_9 = 'category-9';
    public const CATEGORY_10 = 'category-10';
    public const CATEGORY_11 = 'category-11';
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setTitle('Tout public');

        $manager->persist($category);


        $category2 = new Category();
        $category2->setTitle('Moins de 16 ans');

        $manager->persist($category2);

        $category3 = new Category();
        $category3->setTitle('Moins de 18 ans');

        $manager->persist($category3);

        $category4 = new Category();
        $category4->setTitle('Nos Tapas');

        $manager->persist($category4);


        $category5 = new Category();
        $category5->setTitle('Nos Burgers');

        $manager->persist($category5);

        $category6 = new Category();
        $category6->setTitle('Nos salades');

        $manager->persist($category6);

        $category7 = new Category();
        $category7->setTitle('Rostie & Steak');

        $manager->persist($category7);

        $category8 = new Category();
        $category8->setTitle('Tarif Client');

        $manager->persist($category8);


        $category9 = new Category();
        $category9->setTitle('Tarif Groupe');

        $manager->persist($category9);

        $category10 = new Category();
        $category10->setTitle('Tarif Abonné');

        $manager->persist($category10);

        $category11 = new Category();
        $category11->setTitle('Evenements');

        $manager->persist($category11);

        $manager->flush();

        $this->addReference(self::CATEGORY_1, $category);
        $this->addReference(self::CATEGORY_2, $category2);
        $this->addReference(self::CATEGORY_3, $category3);
        $this->addReference(self::CATEGORY_4, $category4);
        $this->addReference(self::CATEGORY_5, $category5);
        $this->addReference(self::CATEGORY_6, $category6);
        $this->addReference(self::CATEGORY_7, $category8);
        $this->addReference(self::CATEGORY_8, $category8);
        $this->addReference(self::CATEGORY_9, $category9);
        $this->addReference(self::CATEGORY_10, $category10);
        $this->addReference(self::CATEGORY_11, $category11);
    }
}