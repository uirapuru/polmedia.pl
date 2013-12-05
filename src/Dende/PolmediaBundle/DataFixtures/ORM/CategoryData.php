<?php

namespace Dende\PolmediaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dende\PolmediaBundle\Entity\Category;

class CategoryData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        $actionCategory = new Category();
        $actionCategory->setOrderNumber(20);
        $actionCategory->setSlug("action");
        $actionCategory->setTitle("Action/Drama");
        
        $this->addReference("categoryAction",$actionCategory);

        $manager->persist($actionCategory);
        $manager->flush();
        
        $adventureCategory = new Category();
        $adventureCategory->setOrderNumber(10);
        $adventureCategory->setSlug("adventure");
        $adventureCategory->setTitle("Family/Adventure");
        
        $this->addReference("categoryAdventure",$adventureCategory);

        $manager->persist($adventureCategory);
        $manager->flush();
        
        $animationCategory = new Category();
        $animationCategory->setOrderNumber(30);
        $animationCategory->setSlug("animation");
        $animationCategory->setTitle("Animation");

        $this->addReference("categoryAnimation", $animationCategory);
        
        $manager->persist($animationCategory);
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 1; // the order in which fixtures will be loaded
    }

}
