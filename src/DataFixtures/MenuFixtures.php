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
        $menu->setDescription('steak cheddar,sauce ketchup mayo ou sauce hot');
        $menu->setPrix('9.50€');
        $manager->persist($menu);

        $menu2 = new Menu();
        $menu2->setCategory($this->getReference(CategoryMenuFixtures::CATEGORY_2));
        $menu2->setNom('Chorizo');
        $menu2->setDescription('Chorizo cuit à la plancha');
        $menu2->setPrix('4.90€');
        $manager->persist($menu2);
        
        $menu3 = new Menu();
        $menu3->setCategory($this->getReference(CategoryMenuFixtures::CATEGORY_2));
        $menu3->setNom('Calamard');
        $menu3->setDescription('Beignet de calamards');
        $menu3->setPrix('4.00€');
        $manager->persist($menu3);

        $menu4 = new Menu();
        $menu4->setCategory($this->getReference(CategoryMenuFixtures::CATEGORY_3));
        $menu4->setNom('l Original');
        $menu4->setDescription('Steak bacon cheddar galette de pomme de terre, sauce blanche');
        $menu4->setPrix('11.50€');
        $manager->persist($menu4);

        $menu5 = new Menu();
        $menu5->setCategory($this->getReference(CategoryMenuFixtures::CATEGORY_3));
        $menu5->setNom('le double Original');
        $menu5->setDescription('Steak bacon cheddar galette de pomme de terre, sauce blanche');
        $menu5->setPrix('13.00€');
        $manager->persist($menu5);

        $menu6 = new Menu();
        $menu6->setCategory($this->getReference(CategoryMenuFixtures::CATEGORY_1));
        $menu6->setNom('Le black Angus');
        $menu6->setDescription('Steak 125g, cheddar,salade, tomate et sauce burger');
        $menu6->setPrix('10.50€');
        $manager->persist($menu6);

        $menu7 = new Menu();
        $menu7->setCategory($this->getReference(CategoryMenuFixtures::CATEGORY_4));
        $menu7->setNom('La chiken');
        $menu7->setDescription('mesclun de salade, lardon, tomate, poulet, croutons, parmesans');
        $menu7->setPrix('9.50€');
        $manager->persist($menu7);

        $menu8 = new Menu();
        $menu8->setCategory($this->getReference(CategoryMenuFixtures::CATEGORY_4));
        $menu8->setNom('La chevre chaud ');
        $menu8->setDescription('mesclun de salade, lardon, tomate,chévre panes, croutons');
        $menu8->setPrix('11.50€');
        $manager->persist($menu8);

        $menu9 = new Menu();
        $menu9->setCategory($this->getReference(CategoryMenuFixtures::CATEGORY_5));
        $menu9->setNom('Sunday ');
        $menu9->setDescription('glace vanille, sauce fraise ou chocolat ou caramel');
        $menu9->setPrix('9.50€');
        $manager->persist($menu9);
        
        $menu10 = new Menu();
        $menu10->setCategory($this->getReference(CategoryMenuFixtures::CATEGORY_5));
        $menu10->setNom('gateau chocolat ');
        $menu10->setDescription('gateaux au chocolat avec chantilly');
        $menu10->setPrix('10.50€');
        $manager->persist($menu10);
        $manager->flush();
   

}}
