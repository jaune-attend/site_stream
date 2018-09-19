<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Comments;
use App\Entity\Film;
use App\Entity\Category;

class DataFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        
        
        for ($i = 0; $i < 10; $i++)
        {
            $user = new User();
            $user->setPrenom($faker->name)
                ->setNom($faker->name)
                ->setEmail($faker->email)
                ->setMdp($faker->numberBetween($min = 1000, $max = 9999));
                
            $manager->persist($user);
        }
        
        
        for($k = 0; $k < 10; $k++)
        {
            $category = new Category();
            $category->setName($faker->sentence());
            $manager->persist($category);
        }
        
        $comments = new Comments();
        for ($l = 0; $l < 10; $l++)
        {
            $comments->setAuteur($user)
                ->setContenu($faker->sentence());
            $manager->persist($comments);
        }
        
        
        for ($j = 0; $j < 10; $j++)
        {
            $film = new Film();
            $film->setTitre($faker->sentence())
                ->setContenu($faker->imageUrl($width = 250, $height = 250))
                ->setUser($user)
                ->setCategory($category);
            $manager->persist($film);
        }
        

        $manager->flush();
    }
}
