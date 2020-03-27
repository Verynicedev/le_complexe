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
    public const CATEGORY_3='category-9';
    public const CATEGORY_4='category-10';
    public const CATEGORY_5='category-11';

    public function load(ObjectManager $manager)
    {

        $categoryMenu = new CategoryMenu();
        $categoryMenu->setNom('Nos burger');
        $categoryMenu->setImage('img/burger.png');
        $manager->persist($categoryMenu);

        $categoryMenu2 = new CategoryMenu();
        $categoryMenu2->setNom('Nos Tapas');
        $categoryMenu2->setImage('img/tapas1.jpg');
        $manager->persist($categoryMenu2);

        $categoryMenu3 = new CategoryMenu();
        $categoryMenu3->setNom('Nos Rosties and steak');
        $categoryMenu3->setImage('img/rostie.jpg');
        $manager->persist($categoryMenu3);

        $categoryMenu4 = new CategoryMenu();
        $categoryMenu4->setNom('Nos Salades');
        $categoryMenu4->setImage('img/salade.jpg');
        $manager->persist($categoryMenu4);

        $categoryMenu5 = new CategoryMenu();
        $categoryMenu5->setNom('Nos desserts');
        $categoryMenu5->setImage('img/sunday.jpg');
        $manager->persist($categoryMenu5);

        $manager->flush();
        $this->addReference(self::CATEGORY_1, $categoryMenu);
        $this->addReference(self::CATEGORY_2, $categoryMenu2);
        $this->addReference(self::CATEGORY_3, $categoryMenu3);
        $this->addReference(self::CATEGORY_4, $categoryMenu4);
        $this->addReference(self::CATEGORY_5, $categoryMenu5);
    }
}
   