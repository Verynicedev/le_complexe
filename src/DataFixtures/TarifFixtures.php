<?php

namespace App\DataFixtures;

use App\Entity\Tarif;
use App\DataFixtures\CategoryTarifFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TarifFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tarif = new Tarif();
        $tarif->setNom('Tarif Client')
              ->setPrix1('9')
              ->setPrix2('17')
              ->setPrix3('24')
              ->setCategory($this->getReference(CategoryTarifFixtures::CATEGORY_1))
        ;
        $manager->persist($tarif);
        
        $tarif2 = new Tarif();
        $tarif2->setNom('Tarif Groupe')
              ->setPrix1('8')
              ->setPrix2('15')
              ->setPrix3('21')
              ->setCategory($this->getReference(CategoryTarifFixtures::CATEGORY_1))
        ;
        $manager->persist($tarif2);

        $tarif = new Tarif();
        $tarif->setNom('Tarif Abonné')
              ->setPrix1('6')
              ->setPrix2('11')
              ->setPrix3('15')
              ->setCategory($this->getReference(CategoryTarifFixtures::CATEGORY_1))
        ;
        $manager->persist($tarif);

        $manager->flush();
    }
}
