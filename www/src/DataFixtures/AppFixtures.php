<?php

namespace App\DataFixtures;

use App\Entity\Soggetto;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $soggetto = new Soggetto(
                $faker->firstName,
                $faker->lastName,
                $faker->address,
                $faker->email
            );
            $manager->persist($soggetto);
        }

        $manager->flush();
    }
}
