<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    const ACTORS = [];

    public function load(ObjectManager $manager): void
    {
        //$faker = Factory::create();

        //for($i = 0; $i <10; $si++) {
        //   $actor = new Actor();
        //    $actor->setName($faker->name());

        //    $actor->setName($this->getReference('program_' .$faker->name));
        // }

        foreach(self::ACTORS as $key=> $actorName) {
            $actor = new Actor();
            $actor->setName($actorName);
            $manager->persist($actor);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProgramFixtures::class,
        ];
    }
}
