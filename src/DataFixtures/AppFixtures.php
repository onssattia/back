<?php

namespace App\DataFixtures;


use App\Entity\PieceGenerale;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($p = 0; $p < 50; $p++) {
            $pieceGenerale = new PieceGenerale;
            $pieceGenerale->setTitle($faker->catchPhrase)
                ->setContent($faker->paragraphs(5, true))
                ->setCreatedAt($faker->dateTimeBetween('-6 months'));

            $manager->persist($pieceGenerale);

             
        }

        $manager->flush();
    }
}