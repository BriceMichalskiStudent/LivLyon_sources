<?php

namespace LIV\AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LIV\AppBundle\Entity\Place;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 place! Bam!
        for ($i = 0; $i < 20; $i++) {
            $product = new Place();
            $product->setName("place-".$i);
            $product->setRating(round($i/4));
            $product->setShortDescription("short");
            $product->setFullDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rhoncus turpis ac lacus interdum porta. Proin aliquet accumsan purus, sed consectetur nisi vestibulum at. Praesent non dictum ipsum. Nunc fermentum velit ligula, non volutpat nisi fermentum ut. Sed sollicitudin ante ut diam ornare congue. Aenean efficitur arcu metus, a malesuada urna tincidunt eget. Integer commodo ante vitae metus egestas, sit amet sollicitudin sapien egestas. Cras vehicula elit id orci bibendum, euismod hendrerit velit semper.");
            $product->setCity("lyon");
            $product->setZipCode("69003");
            $product->setStreet("rue de paris");
            $product->setStreetNumber("24");
            $product->setLatitude(45.0987778);
            $product->setLongitude(2.0983787883);
            $product->setInformation("24/24h 7/7j");
            $manager->persist($product);
        }

        $manager->flush();
    }
}
