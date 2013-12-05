<?php

namespace Dende\PolmediaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dende\PolmediaBundle\Entity\Video;

class VideosData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {

        $data = array(
            array(
                "cast"           => "Stallone, Kowalski, Majewski",
                "directorsName"  => "Spielberg",
                "duration"       => 190,
                "isFront"        => true,
                "isMain"         => true,
                "mainImage"      => "front.jpg",
                "plot"           => "Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.",
                "prizes"         => "Oscar 1999",
                "productionYear" => 1999,
                "title"          => "Rambo",
                "youtube"        => "0PMGfBM004E",
                "category"       => "categoryAction",
                "reference"      => "video01"
            ),
            array(
                "cast"           => "Stallone, Kowalski, Majewski",
                "directorsName"  => "Sergio Leone",
                "duration"       => 190,
                "isFront"        => false,
                "isMain"         => false,
                "mainImage"      => "front.jpg",
                "plot"           => "Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.",
                "prizes"         => "Oscar 1999",
                "productionYear" => 2000,
                "title"          => "Rambo II",
                "youtube"        => "0PMGfBM004E",
                "category"       => "categoryAction",
                "reference"      => "video02"
            ),
            array(
                "cast"           => "Stallone, Kowalski, Majewski",
                "directorsName"  => "Spielberg",
                "duration"       => 190,
                "isFront"        => false,
                "isMain"         => false,
                "mainImage"      => "front.jpg",
                "plot"           => "Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.",
                "prizes"         => "Oscar 1999",
                "productionYear" => 1999,
                "title"          => "Rambo III",
                "youtube"        => "0PMGfBM004E",
                "category"       => "categoryAction",
                "reference"      => "video03"
            ),
            array(
                "cast"           => "Stallone, Kowalski, Majewski",
                "directorsName"  => "Spielberg",
                "duration"       => 190,
                "isFront"        => false,
                "isMain"         => false,
                "mainImage"      => "front.jpg",
                "plot"           => "Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.",
                "prizes"         => "Oscar 1999",
                "productionYear" => 1999,
                "title"          => "Rocky",
                "youtube"        => "0PMGfBM004E",
                "category"       => "categoryAnimation",
                "reference"      => "video04"
            ),
            array(
                "cast"           => "Stallone, Kowalski, Majewski",
                "directorsName"  => "Spielberg",
                "duration"       => 190,
                "isFront"        => false,
                "isMain"         => false,
                "mainImage"      => "front.jpg",
                "plot"           => "Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.",
                "prizes"         => "Oscar 1999",
                "productionYear" => 1999,
                "title"          => "Rocky II",
                "youtube"        => "0PMGfBM004E",
                "category"       => "categoryAdventure",
                "reference"      => "video05"
            ),
            array(
                "cast"           => "Stallone, Kowalski, Majewski",
                "directorsName"  => "Spielberg",
                "duration"       => 190,
                "isFront"        => false,
                "isMain"         => false,
                "mainImage"      => "front.jpg",
                "plot"           => "Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.",
                "prizes"         => "Oscar 1999",
                "productionYear" => 1999,
                "title"          => "Rocky III",
                "youtube"        => "0PMGfBM004E",
                "category"       => "categoryAdventure",
                "reference"      => "video06"
            ),
        );

        foreach ($data as $video) {
            $v = new Video();
            $v->setCast($video["cast"]);
            $v->setDirectorsName($video["directorsName"]);
            $v->setDuration($video["duration"]);
            $v->setIsFront($video["isFront"]);
            $v->setIsMain($video["isMain"]);
            $v->setMainImage($video["mainImage"]);
            $v->setPlot($video["plot"]);
            $v->setPrizes($video["prizes"]);
            $v->setProductionYear($video["productionYear"]);
            $v->setTitle($video["title"]);
            $v->setYoutube($video["youtube"]);
            $v->setCategory($this->getReference($video["category"]));

            $this->addReference($video["reference"], $v);
            
            $manager->persist($v);
            $manager->flush();
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 2; // the order in which fixtures will be loaded
    }

}
