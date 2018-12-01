<?php

namespace LIV\AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use LIV\AppBundle\Entity\Address;
use LIV\AppBundle\Entity\Place;
use LIV\AppBundle\Entity\PlaceCategory;
use LIV\AppBundle\Entity\Tag;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter\AlignFormatter;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $commonCategory = new PlaceCategory();
        $commonCategory->setName("common");
        $manager->persist($commonCategory);

        $commonTag = new Tag();
        $commonTag->setName("common-tag");
        $manager->persist($commonTag);

        // create 20 place! Bam!
        for ($i = 0; $i < 20; $i++) {
            $tag = new Tag();
            $tag->setName("tag-".$i);

            $address = new Address();
            $address->setCity("lyon");
            $address->setZipCode("69003");
            $address->setStreet("avenue thiers");
            $address->setStreetNumber($i);

            $place = new Place();
            $place->setAddress($address);
            $place->setName("place-".$i);
            $place->setRating(round($i/4));
            $place->setShortDescription("short description of my beautifull restaurant come on");
            $place->setFullDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rhoncus turpis ac lacus interdum porta. Proin aliquet accumsan purus, sed consectetur nisi vestibulum at. Praesent non dictum ipsum. Nunc fermentum velit ligula, non volutpat nisi fermentum ut. Sed sollicitudin ante ut diam ornare congue. Aenean efficitur arcu metus, a malesuada urna tincidunt eget. Integer commodo ante vitae metus egestas, sit amet sollicitudin sapien egestas. Cras vehicula elit id orci bibendum, euismod hendrerit velit semper.");
            $place->setLatitude(45.7788368);
            $place->setLongitude(4.872813299999962);
            $place->setInformation("24/24h 7/7j");

            $place->addTag($commonTag);
            $place->addTag($tag);

            $categoriePlaces = new PlaceCategory();
            $categoriePlaces->setName("my super category ".$i);
            $manager->persist($categoriePlaces);

            $place->addCategory($commonCategory);
            $place->addCategory($categoriePlaces);

            $manager->persist($tag);
            $manager->persist($place);
            $manager->flush();
        }
    }
}
