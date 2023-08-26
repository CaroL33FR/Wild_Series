<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
/*SERVICES: slug -> using slug in fixtures -> process*/

    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }
/*ENDS of SERVICES*/

    public function load(ObjectManager $manager)
    {

        /*for ($i = 0; $i < 10; $i++) {*/
            $program = new Program();
            $program->setTitle('Arcane');
            $program->setYear(1929);
            $program->setSynopsis("Dans le monde de Runeterra, deux villes au même endroit sont en conflit : Piltover, 
            constituant la partie supérieure...");
            $program->setCategory($this->getReference('category_Animation'));
    /*SERVICES: Slug*/
            $program = $this->slugger->slug($program->getTitle());
            /*$program->setSlug($slug);*/
    /*ENDS*/
            $this->addReference('program_1', $program);
            $manager->persist($program);
        /*}*/
            $manager->flush();

            /* Deuxième série */
            $program = new Program();
            $program->setTitle('Malcolm');
            $program->setYear(2000);
            $program->setSynopsis("La série raconte le quotidien de la famille de Malcolm, troisième fils d'une 
            fratrie de quatre garçons au début de la série.");
            $program->setCategory($this->getReference('category_Comédie'));
    /*SERVICES: Slug
            $slug = $slugger->slug($program->getTitle());
            $program->setSlug($slug);*/
    /*ENDS*/
            $this->addReference('program_2', $program);
            $manager->persist($program);
            $manager->flush();

            /* Troisième série */
            $program = new Program();
            $program->setTitle('Les mystères de l\'Ouest');
            $program->setYear(1965);
            $program->setSynopsis("Cette série met en scène les aventures de deux agents de l’United States Secret Service, 
            au service du président des États-Unis Ulysses S. Grant (1869 à 1877) : James T. West et Artemus Gordon.");
            $program->setCategory($this->getReference('category_Aventure'));
    /*SERVICES: Slug
            $slug = $slugger->slug($program->getTitle());
            $program->setSlug($slug);*/
        /*ENDS*/
            $this->addReference('program_3', $program);
            $manager->persist($program);
            $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }


}
