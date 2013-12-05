<?php

namespace Dende\PolmediaBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Dende\PolmediaBundle\Entity\VideoRepository;

class VideoRepositoryTest extends WebTestCase {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @var Dende\PolmediaBundle\Entity\VideoRepository
     */
    private $repository;

    protected function setUp() {
        parent::setUp();

        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
                ->get('doctrine')
                ->getManager();
        $this->repository = $this->em->getRepository("PolmediaBundle:Video");
    }

    public function testGetPromotedIndex() {
        $result = $this->repository->getPromotedVideos();
        $this->assertCount(5, $result);
    }

    public function testGetMainVideos() {
        $result = $this->repository->getMainVideos();
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
