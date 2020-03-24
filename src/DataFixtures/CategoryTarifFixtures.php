<?php

namespace App\DataFixtures;

use App\Entity\CategoryTarif;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryTarifFixtures extends Fixture
{
    public const CATEGORY_1 = 'category-3';
    public const CATEGORY_2 = 'category-4';
    public function load(ObjectManager $manager)
    {
        $category = new CategoryTarif();
        $category->setNom('Nos tarifs');
        $manager->persist($category);

        $category2 = new CategoryTarif();
        $category2->setNom('Nos Formules');
        $manager->persist($category2);
        $manager->flush();
        $this->addReference(self::CATEGORY_1, $category);
        $this->addReference(self::CATEGORY_2, $category2);
    }
}
