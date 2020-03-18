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


        $manager->flush();

        $this->addReference(self::CATEGORY_1, $category);
        $this->addReference(self::CATEGORY_2, $category2);
        $this->addReference(self::CATEGORY_3, $category3);
    }
}