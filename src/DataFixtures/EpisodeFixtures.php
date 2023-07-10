<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        /* SERIE ARCANE : saison 1, épisodes 1 à 3 */
        $episode = new Episode();
        $episode->setTitle('Welcome to the Playground');
        $episode->setNumber(1);
        $episode->setSynopsis("Les sœurs orphelines Vi et Powder causent des remous dans les rues souterraines 
        de Zaun à la suite d'un braquage dans le très huppé Piltover.");
        $episode->setSeason($this->getReference('season' . $faker->numberBetween(1, 50)));
        $manager->persist($episode);
        $manager->flush();

        $episode = new Episode();
        $episode->setTitle('Certains mystères ne devraient jamais être résolus');
        $episode->setNumber(2);
        $episode->setSynopsis("Idéaliste, le chercheur Jayce tente de maîtriser la magie par la science malgré les
        avertissements de son mentor. Le criminel Silco teste une substance puissante.");
        $episode->setSeason($this->getReference('season' . $faker->numberBetween(1, 50)));
        $manager->persist($episode);
        $manager->flush();

        $episode = new Episode();
        $episode->setTitle('Cette violence crasse nécessaire au changement');
        $episode->setNumber(3);
        $episode->setSynopsis("Deux anciens rivaux s'affrontent lors d'un défi spectaculaire qui se révèle fatidique pour
        Zaun. Jayce et Viktor prennent de gros risques pour leurs recherches. ");
        $episode->setSeason($this->getReference('season' . $faker->numberBetween(1, 50)));
        $manager->persist($episode);
        $manager->flush();

        /* SERIE MALCOLM : saison 1, épisodes 1 à 3 */
        $episode = new Episode();
        $episode->setTitle('Je ne suis pas un monstre');
        $episode->setNumber(1);
        $episode->setSynopsis("Le synopsis de l'épisode 1 de la saison 1 bientôt disponible.");
        $episode->setSeason($this->getReference('season' . $faker->numberBetween(1, 50)));
        $manager->persist($episode);
        $manager->flush();

        $episode = new Episode();
        $episode->setTitle('Alerte rouge');
        $episode->setNumber(2);
        $episode->setSynopsis( "Le synopsis de l'épisode 2 de la saison 1 bientôt disponible.");
        $episode->setSeason($this->getReference('season' . $faker->numberBetween(1, 50)));
        $manager->persist($episode);
        $manager->flush();

        $episode = new Episode();
        $episode->setTitle('Seuls à la maison');
        $episode->setNumber(3);
        $episode->setSynopsis("Le synopsis de l'épisode 3 de la saison 1 bientôt disponible.");
        $episode->setSeason($this->getReference('season' . $faker->numberBetween(1, 50)));
        $manager->persist($episode);
        $manager->flush();


        /* SERIE LES MYSTERES DE L'OUEST : saison 1, épisodes 1 à 3 */
        $episode = new Episode();
        $episode->setTitle('La nuit des ténèbres');
        $episode->setNumber(1);
        $episode->setSynopsis("Le synopsis de l'épisode 1 de la saison 1 bientôt disponible.");
        $episode->setSeason($this->getReference('season' . $faker->numberBetween(1, 50)));
        $manager->persist($episode);
        $manager->flush();

        $episode = new Episode();
        $episode->setTitle('La nuit du lit qui tue');
        $episode->setNumber(2);
        $episode->setSynopsis( "Le synopsis de l'épisode 2 de la saison 1 bientôt disponible.");
        $episode->setSeason($this->getReference('season' . $faker->numberBetween(1, 50)));
        $manager->persist($episode);
        $manager->flush();

        $episode = new Episode();
        $episode->setTitle('La nuit de la terreur');
        $episode->setNumber(3);
        $episode->setSynopsis("Le synopsis de l'épisode 3 de la saison 1 bientôt disponible.");
        $episode->setSeason($this->getReference('season' . $faker->numberBetween(1, 50)));
        $manager->persist($episode);
        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}
