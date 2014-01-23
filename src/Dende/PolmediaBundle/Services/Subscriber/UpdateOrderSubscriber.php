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
        $this->index1($args);
        $this->index2($args);
    }

    public function index1($args) {
       
        $entityManager = $args->getEntityManager();
        $sql = "update videos, "
                . "(select id, @rn:=@rn+10 as vorder "
                . "from (select id from videos "
                . "where deletedAt is null "
                . "and video_type = 'header' "
                . "order by video_order asc) t1, "
                . "(select @rn:=0) as t2) src "
                . "set videos.video_order = src.vorder "
                . "where videos.id = src.id";

        $conn = $entityManager->getConnection();

        $conn->exec($sql);
    }
    public function index2($args) {
       
        $entityManager = $args->getEntityManager();
        $sql = "update videos, "
                . "(select id, @rn:=@rn+10 as vorder "
                . "from (select id from videos "
                . "where deletedAt is null "
                . "and video_type = 'front' "
                . "order by video_order asc) t1, "
                . "(select @rn:=0) as t2) src "
                . "set videos.video_order = src.vorder "
                . "where videos.id = src.id";

        $conn = $entityManager->getConnection();

        $conn->exec($sql);
    }

}
