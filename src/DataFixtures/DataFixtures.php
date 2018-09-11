<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entiry\Comments;
use App\Entity\Film;

class DataFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        
        $user = new User();
        for ($i = 0; $i < 10; $i++)
        {
            $user->setPrenom($faker->name)
                ->setNom($faker->name)
                ->setEmail($faker->email)
                ->setMdp($faker->numberBetween($min = 1000, $max = 9999));
                
            $manager->persist($user);
        }
        //$comments = new Comments();
        

        $manager->flush();
    }
}
