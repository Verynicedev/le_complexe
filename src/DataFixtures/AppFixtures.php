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
        $page ->setTitle('PAGETEST')
                    ->setContent("TEST CONTENT")
                    ->setImage('https://images4.alphacoders.com/646/thumb-1920-646065.jpg')
            // ->setCreatedAt(new \DateTime())->setPublished(true)
            
            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_1));

        $manager->persist($page);

        $page2 = new Page();
        $page2 ->setTitle('PAGETEST 2')
                    ->setContent("TEST CONTENT 2")
                    ->setImage('http://www.fondsecran.eu/a/get_photo/176653/1920/1080')
            // ->setCreatedAt(new \DateTime())->setPublished(true)
            
            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_2));

        $manager->persist($page2);

        $page3 = new Page();
        $page3 ->setTitle('PAGETEST 3')
                    ->setContent("TEST CONTENT 3")
                    ->setImage('https://images2.alphacoders.com/894/thumb-1920-894283.jpg')
            // ->setCreatedAt(new \DateTime())->setPublished(true)
            
            ->setCategory($this->getReference(CategoryFixtures::CATEGORY_3));

        $manager->persist($page3);

        $manager->flush();
    }

    public function getDependencies() {
        return array(
            CategoryFixtures::class,            
        );
    }
}
