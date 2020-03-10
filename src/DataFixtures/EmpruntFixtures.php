<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Emprunt;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EmpruntFixtures extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(10, "emprunt", function($num){
            $emprunt= new Emprunt;
            $dateSortie= $this->faker->dateTime("now");
            $dateRendu= $this->faker->dateTimeBetween( $dateSortie, "now");
            $emprunt->setDateSortie($dateSortie)
                    ->setDateRendu($dateRendu)
                    ->setAbonne($this->getRandomReference("abonne"))
                    ->setLivre($this->getRandomReference("livre"));

            return $emprunt;
        });

        $manager->flush();
    }
    public function getDependencies(){
        return [AbonneFixtures::class, LivreFixtures::class];
    }
}
