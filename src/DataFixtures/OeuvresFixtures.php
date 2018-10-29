<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\GeoLoc;
use App\Entity\Oeuvre;
use App\Entity\Adresse;
use App\Entity\CollectionStreet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class OeuvresFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 1; $i <=3; $i++)
        {
            $collection = new Collectionstreet();
            $collection->setnom($faker->sentence())
                     ->setDescription($faker->paragraph(10));

            $manager->persist($collection);
            for ($j=0; $j<5; $j++) 
            {
                $oeuvre = new Oeuvre();
                $oeuvre->setNom($faker->sentence())
                       ->setImage($faker->imageUrl($width = 640, $height = 480))
                       ->setDescription($faker->paragraph(10))
                       ->setCreatedAt($faker->dateTimeBetween('-5 month'))
                       ->setcollectionStreet($collection);

                $adresse = new Adresse ();
                $libelle = array("av", "Rue", "BD");
                $adresse->setArrondissement($faker->postcode())
                        ->setTypeVoie($libelle[rand(0,2)])
                        ->setLibelleVoie($faker->streetName())
                        ->setNumero(rand(1,50))
                        ->setRelation($oeuvre);
                $manager->persist($adresse);

                $artist = new Artist();
                $artist->setNom($faker->name($gender = 'male'|'female'))
                        ->addRelation($oeuvre);
                
                $manager->persist($artist);

                $localisattion = new GeoLoc();
                $localisattion->setX($faker->latitude($min = -90, $max = 90))
                              ->setY($faker->longitude($min = -180, $max = 180))
                              ->setRelation($oeuvre);
                $manager->persist($localisattion);

                $manager->persist($oeuvre);
            } 
        }
        $manager->flush();
    }
}
