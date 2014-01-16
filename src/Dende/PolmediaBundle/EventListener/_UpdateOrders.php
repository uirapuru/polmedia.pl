<?php
namespace Dende\PolmediaBundle\EventListener;

use Doctrine\ORM\Event\PostFlushEventArgs;
use Dende\PolmediaBundle\Entity\Video;
use Doctrine\ORM\EntityManager;

class UpdateOrders {

    private $needsFlush = false;

    /**
     *
     * @var EntityManager 
     */
    private $em;

    private function assignOrders() {
        $videos = $this->em->getRepository("PolmediaBundle:Video")->getAllVideos();

        $order = $step = 10;

        /** @var Video video */
        foreach ($videos as $video) {
            $video->setOrder($order);
            $this->em->persist($video);
            $order+=$step;
        }

        $this->needsFlush = true;
    }

    public function postFlush(PostFlushEventArgs $args) {
        $this->em = $args->getEntityManager();

        $this->assignOrders();

        if ($this->needsFlush)
        {
            $this->needsFlush = false;
            $args->getEntityManager()->flush();
        }
    }

}
