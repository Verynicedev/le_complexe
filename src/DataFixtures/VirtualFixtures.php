<?php

namespace App\DataFixtures;

use App\Entity\Virtual;
use App\DataFixtures\TagVirtualFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\CategoryVirtualFixtures;
use Doctrine\Common\Persistence\ObjectManager;

class VirtualFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $virtual = new Virtual();
        $virtual->setNom('Resident Evil')
                ->setCategory($this->getReference(CategoryVirtualFixtures::CATEGORY_2))
                ->addTag($this->getReference(TagVirtualFixtures::TAG_1))
                ->setImage('img/ron-whitaker.jpg')
                ->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique cupiditate eius iste reprehenderit accusamus omnis ipsum, quos doloremque quis facilis, laudantium ipsam saepe reiciendis quas cum? Ut nesciunt porro nostrum! Voluptatem voluptatibus veritatis aliquam ex quasi.')
        ;
        $manager->persist($virtual);
        $virtual2 = new Virtual();
        $virtual2->setNom('Top Spin')
                ->setCategory($this->getReference(CategoryVirtualFixtures::CATEGORY_1))
                ->addTag($this->getReference(TagVirtualFixtures::TAG_2))
                ->setImage('img/code.png')
                ->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique cupiditate eius iste reprehenderit accusamus omnis ipsum, quos doloremque quis facilis, laudantium ipsam saepe reiciendis quas cum? Ut nesciunt porro nostrum! Voluptatem voluptatibus veritatis aliquam ex quasi.')
        ;
        $manager->persist($virtual2);

        $manager->flush();
    }
}
