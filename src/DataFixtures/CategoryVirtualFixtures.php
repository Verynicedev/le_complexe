<?php

namespace App\DataFixtures;

use App\Entity\CategoryVirtual;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryVirtualFixtures extends Fixture
{
    public const CATEGORY_1 = 'category-1';
    public const CATEGORY_2 = 'category-2';
    public const CATEGORY_6 = 'category-6';
    public function load(ObjectManager $manager)
    {
        $category = new CategoryVirtual();
        $category->setNom('Tout public');
        $category->setImage('img/salle2.jpg');
        $manager->persist($category);

        $category2 = new CategoryVirtual();
        $category2->setNom('Interdit aux -16 ans');
        $category2->setImage('img/salle2.jpg');

        $manager->persist($category2);

        $category6 = new CategoryVirtual();
        $category6->setNom('Interdit aux -18 ans');
        $category6->setImage('img/salle2.jpg');

        $manager->persist($category6);

        $manager->flush();
        
        $this->addReference(self::CATEGORY_1, $category);
        $this->addReference(self::CATEGORY_2, $category2);
        $this->addReference(self::CATEGORY_6, $category6);
    }
}
