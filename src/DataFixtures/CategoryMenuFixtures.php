<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use App\Entity\CategoryMenu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryMenuFixtures extends Fixture
{
    public const CATEGORY_1='category-7';
    public const CATEGORY_2='category-8';
    public function load(ObjectManager $manager)
    {

        $categoryMenu = new CategoryMenu();
        $categoryMenu->setNom('Nos burger');
        $categoryMenu->setImage('img/burger.png');
        $manager->persist($categoryMenu);

        $categoryMenu2 = new CategoryMenu();
        $categoryMenu2->setNom('Nos Tapas');
        $categoryMenu2->setImage('img/city.png');

        
        $manager->persist($categoryMenu2);

        $manager->flush();
        $this->addReference(self::CATEGORY_1, $categoryMenu);
        $this->addReference(self::CATEGORY_2, $categoryMenu2);
    }
}
   