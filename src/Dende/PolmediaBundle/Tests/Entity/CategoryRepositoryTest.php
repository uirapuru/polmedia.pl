<?php

namespace Dende\PolmediaBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Dende\PolmediaBundle\Entity\CategoryRepository;

class CategoryRepositoryTest extends WebTestCase {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @var Dende\PolmediaBundle\Entity\CategoryRepository
     */
    private $repository;

    protected function setUp() {
        parent::setUp();

        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
                ->get('doctrine')
                ->getManager();
        $this->repository = $this->em->getRepository("PolmediaBundle:Category");
    }

    public function testGetAllCategories() {
        $result = $this->repository->getAllCategories();
        $this->assertCount(3, $result);
    }

    
}
