<?php

namespace Dende\PolmediaBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Dende\PolmediaBundle\Entity\VideoRepository;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;

class VideoRepositoryTest extends WebTestCase {
// <editor-fold defaultstate="collapsed" desc="fields">

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @var Dende\PolmediaBundle\Entity\VideoRepository
     */
    private $repository; // </editor-fold>

// <editor-fold defaultstate="collapsed" desc="setup">

    protected function setUp() {
        static::$kernel = static::createKernel();
        static::$kernel->boot();

        $this->em = static::$kernel->getContainer()
                ->get('doctrine')
                ->getManager();

        $this->repository = $this->em->getRepository("PolmediaBundle:Video");

        $this->loader = new Loader;
        $this->loader->loadFromDirectory(__DIR__ . '/../../DataFixtures/ORM');

        $purger = new ORMPurger($this->em);
        $executor = new ORMExecutor($this->em, $purger);
        $executor->execute($this->loader->getFixtures());
    }

    protected function tearDown() {
//        parent::tearDown();
//        $this->em->close();
    }

// </editor-fold>

    public function testGetPromotedIndex() {
        $result = $this->repository->getFrontVideos();
        $this->assertCount(5, $result);
    }

    public function testgetHeaderVideos() {
        $result = $this->repository->getHeaderVideos();
        $this->assertCount(1, $result);
    }

    public function testGetVideos() {
        $category = $this->em->getRepository("PolmediaBundle:Category")
                ->findOneBySlug("adventure");

        $result = $this->repository->getVideos($category);
        $this->assertCount(2, $result);

        $result = $this->repository->getVideos(null);
        $this->assertCount(6, $result);
    }

    public function testGetAllVideos() {
        $result = $this->repository->getAllVideos();
        $this->assertCount(6, $result);
    }

}
