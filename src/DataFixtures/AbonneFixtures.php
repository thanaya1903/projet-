<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Abonne;
class AbonneFixtures extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $this->createMany(50, "abonne", function($num){
            $prenom= $this->faker->firstName;
            $email = $prenom ."." .$this->faker->lastName . "@yopmail.com";
            return (new Abonne)->setPrenom($prenom)
                               ->setEmail($email);
        });

        $manager->flush();
    }
}