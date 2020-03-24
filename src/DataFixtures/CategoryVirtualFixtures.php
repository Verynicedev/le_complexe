<?php

namespace App\DataFixtures;

use App\Entity\CategoryVirtual;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryVirtualFixtures extends Fixture
{
    public const CATEGORY_1 = 'category-1';
    public const CATEGORY_2 = 'category-2';
    public function load(ObjectManager $manager)
    {
        $category = new CategoryVirtual();
        $category->setNom('-18 ans');
        $manager->persist($category);

        $category2 = new CategoryVirtual();
        $category2->setNom('+18 ans');
        $manager->persist($category2);
        $manager->flush();
        $this->addReference(self::CATEGORY_1, $category);
        $this->addReference(self::CATEGORY_2, $category2);
    }
}
