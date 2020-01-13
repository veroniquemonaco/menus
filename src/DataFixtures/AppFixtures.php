<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-FR');

        for ($i=0; $i<= 21; $i++) {

            $menu = new Menu();

            $day = new \DateTime();
            $dayNumber = $i+2;
            $day->setDate (2020, 01, $dayNumber);

            $menu->setEntree($faker->sentence(2))
                ->setPlat($faker->sentence(2))
                ->setDessert($faker->sentence(2))
                ->setDate($day);

            $manager->persist($menu);
        }

        $manager->flush();
    }
}
