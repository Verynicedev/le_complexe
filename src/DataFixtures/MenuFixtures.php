<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use App\DataFixtures\CategoryMenuFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MenuFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $menu = new Menu();
        $menu->setCategory($this->getReference(CategoryMenuFixtures::CATEGORY_1));
        $menu->setNom('Burger Savoyard');
        $menu->setDescription('tomates, salade,steak,pain maison');
        $menu->setImage('img/laser.jpg');
        $menu->setPrix('10,50€');
        $manager->persist($menu);

        $menu2 = new Menu();
        $menu2->setCategory($this->getReference(CategoryMenuFixtures::CATEGORY_2));
        $menu2->setNom('tapas');
        $menu2->setDescription('calamard');
        $menu2->setImage('img/footervr.jpg');
        $menu2->setPrix('10,50€');
        $manager->persist($menu2);
        $manager->flush();
   

}}
