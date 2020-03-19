<?php

namespace App\DataFixtures;

use App\Entity\Page;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AppFixtures extends Fixture implements DependentFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        $page = new Page();
        $page ->setTitle('Complexe')
                    ->setContent("TEST CONTENT");

        $manager->persist($page);

        $page2 = new Page();
        $page2 ->setTitle('Restaurant')
                    ->setContent("TEST CONTENT 2")

            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_4))
            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_5))
            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_6))
            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_7));

        $manager->persist($page2);

        $page3 = new Page();
        $page3 ->setTitle('Laser Game')
                    ->setContent("TEST CONTENT 3")

            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_9))
            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_10))
            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_11));

        $manager->persist($page3);

        $page4 = new Page();
        $page4 ->setTitle('Réalité Virtuelle')
                    ->setContent("TEST CONTENT 3")

            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_1))
            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_2))
            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_3));

        $manager->persist($page4);

        $manager->flush();
    }

    public function getDependencies() {
        return array(
            CategoryFixtures::class,
        );
    }
}
