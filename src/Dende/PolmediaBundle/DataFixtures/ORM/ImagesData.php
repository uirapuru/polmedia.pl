<?php

namespace Dende\PolmediaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dende\PolmediaBundle\Entity\Image;

class ImagesData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {

        $data = array(
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video01"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video01"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video01"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video01"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video01"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video01"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video01"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video02"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video02"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video02"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video03"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video03"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video04"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video05"
            ),
            array(
                "url"       => "a.jpg",
                "thumbnail" => "b.jpg",
                "isMain"    => 0,
                "video" => "video05"
            ),
        );

        foreach ($data as $image) {
            $i = new Image();
            $i->setIsMain($image["isMain"]);
            $i->setThumbnail($image["thumbnail"]);
            $i->setUrl($image["url"]);
            $i->setVideo($this->getReference($image["video"]));

            $manager->persist($i);
            $manager->flush();
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 3; // the order in which fixtures will be loaded
    }

}
