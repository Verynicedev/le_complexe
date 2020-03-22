<?php

namespace App\DataFixtures;

use App\Entity\TagVirtual;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TagVirtualFixtures extends Fixture
{
    public const TAG_1 = 'tag-1';
    public const TAG_2 = 'tag-2';

    public function load(ObjectManager $manager)
    {
        $tag = new TagVirtual();
        $tag->setNom('Horreur');
        $manager->persist($tag);

        $tag2 = new TagVirtual();
        $tag2->setNom('Sports');
        $manager->persist($tag2);
        $manager->flush();
        $this->addReference(self::TAG_1, $tag);
        $this->addReference(self::TAG_2, $tag2);
    }
}
