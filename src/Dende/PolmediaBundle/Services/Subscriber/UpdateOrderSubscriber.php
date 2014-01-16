<?php

namespace Dende\PolmediaBundle\Services\Subscriber;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\Common\EventSubscriber;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Dende\PolmediaBundle\Entity\Video;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\PostFlushEventArgs;

class UpdateOrderSubscriber implements EventSubscriber {

    protected $container;

    public function getSubscribedEvents() {
        return array(
            'postFlush',
        );
    }

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->container->get("logger")->info("listener loaded");
    }

    public function postUpdate(LifecycleEventArgs $args) {
        $this->index($args);
    }

    public function postPersist(LifecycleEventArgs $args) {
        $this->index($args);
    }

    public function preFlush(PreFlushEventArgs $args) {
        $this->index($args);
    }
    public function postFlush(PostFlushEventArgs $args) {
        $this->index($args);
    }

    public function index($args) {
        $entityManager = $args->getEntityManager();
        $sql = "update videos, (select id, @rn:=@rn+10 as vorder from (select id from videos where deletedAt is null order by video_order asc) t1, (select @rn:=0) as t2) src set videos.video_order = src.vorder where videos.id = src.id";

        $conn = $entityManager->getConnection();

        $conn->exec($sql);
        
//        $query = $entityManager->createNativeQuery($sql, $rsm)->execute();
//
//        die(var_dump($query));

        $this->container->get("logger")->info("Updated orders");

//            $videos = $entityManager->getRepository("PolmediaBundle:Video")->getAllVideos();
//
//            $order = $step = 10;
//
//            /** @var Video video */
//            foreach ($videos as $video) {
//                $video->setOrder($order);
//                $entityManager->persist($video);
//                $this->container->get("logger")->info(sprintf("set video#%d order to %d", $video->getId(), $video->getOrder()));
//                $order+=$step;
//            }
    }

}
