<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public const TAG_1 = 'tag-1';
    public const TAG_2 = 'tag-2';
    public const TAG_3 = 'tag-3';
    public const TAG_4 = 'tag-4';
    public const TAG_5 = 'tag-5';
    public const TAG_6 = 'tag-6';

    public function load(ObjectManager $manager)
    {
        $tag1 = new Tag();
        $tag1->setTitle('Shooter');
        $manager->persist($tag1);

        $tag2 = new Tag();
        $tag2->setTitle('Arcade');
        $manager->persist($tag2);

        $tag3 = new Tag();
        $tag3->setTitle('Action');
        $manager->persist($tag3);

        $tag4 = new Tag();
        $tag4->setTitle('Horreur');
        $manager->persist($tag4);

        $tag5 = new Tag();
        $tag5->setTitle('Escape');
        $manager->persist($tag5);

        $tag6 = new Tag();
        $tag6->setTitle('Enigme');
        $manager->persist($tag6);


        $manager->flush();

        $this->addReference(self::TAG_1, $tag1);
        $this->addReference(self::TAG_2, $tag2);
        $this->addReference(self::TAG_3, $tag3);
        $this->addReference(self::TAG_4, $tag4);
        $this->addReference(self::TAG_5, $tag5);
        $this->addReference(self::TAG_6, $tag6);
    }
}
