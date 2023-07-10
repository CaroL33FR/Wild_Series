<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $season = new Season();
            $season->setNumber($faker->numberBetween(1, 10));
            $season->setYear($faker->year());
            $season->setText($faker->text(100, true));
            $season->setProgram($this->getReference('program_' . $faker->numberBetween(1, 3)));
            $this->addReference('season' . $i, $season);
            $manager->persist($season);
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
        /*
        $season = new Season();
        $season->setNumber(1);
        $season->setYear(2021);
        $season->setText("Arcane est une série télévisée d'animation américano-française");
        $season->setProgram($this->getReference('program_Arcane'));
        $this->addReference('season1_Arcane', $season);
        $manager->persist($season);
        $manager->flush();
*/
        /* Série "Malcolm" */
       /*
        $season = new Season();
        $season->setNumber(1);
        $season->setYear(1999);
        $season->setText("SAISON 1. Série télévisée américaine.");
        $season->setProgram($this->getReference('program_Malcolm'));
        $this->addReference('season1_Malcolm', $season);
        $manager->persist($season);
        $manager->flush();

        $season = new Season();
        $season->setNumber(2);
        $season->setYear(2000);
        $season->setText("SAISON 2. Série télévisée américaine.");
        $season->setProgram($this->getReference('program_Malcolm'));
        $this->addReference('season2_Malcolm', $season);
        $manager->persist($season);
        $manager->flush();

        $season = new Season();
        $season->setNumber(3);
        $season->setYear(2001);
        $season->setText("SAISON 3. Série télévisée américaine.");
        $season->setProgram($this->getReference('program_Malcolm'));
        $this->addReference('season3_Malcolm', $season);
        $manager->persist($season);
        $manager->flush();
*/
        /* Série "Les mystères de l'Ouest" */
        /*
        $season = new Season();
        $season->setNumber(1);
        $season->setYear(1965);
        $season->setText("SAISON 1. Série télévisée américaine en 104 épisodes de cinquante minutes.");
        $season->setProgram($this->getReference('program_WildWest'));
        $this->addReference('season1_WildWest', $season);
        $manager->persist($season);
        $manager->flush();

        $season = new Season();
        $season->setNumber(2);
        $season->setYear(1966);
        $season->setText("SAISON 2. Série télévisée américaine en 104 épisodes de cinquante minutes.");
        $season->setProgram($this->getReference('program_WildWest'));
        $this->addReference('season2_WildWest', $season);
        $manager->persist($season);
        $manager->flush();

        $season = new Season();
        $season->setNumber(3);
        $season->setYear(1967);
        $season->setText("SAISON 3. Série télévisée américaine en 104 épisodes de cinquante minutes.");
        $season->setProgram($this->getReference('program_WildWest'));
        $this->addReference('season3_WildWest', $season);
        $manager->persist($season);
        $manager->flush();
*//*
    }

    public function getDependencies()
    {
        return [
            ProgramFixtures::class,
        ];
    }
}**/
