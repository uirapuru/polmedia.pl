<?php

namespace Dende\PolmediaBundle\Entity;

use Dende\PolmediaBundle\Entity\Video;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * VideoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VideoRepository extends EntityRepository {

    public function getPromotedVideos() {
        $qb = $this->createQueryBuilder("v");

        $query = $qb->where($qb->expr()->andX(
                                        $qb->expr()->eq("v.isMain", 1), $qb->expr()->eq("v.isFront", 0), $qb->expr()->isNull("v.youtube")
                        ))
                        ->orWhere($qb->expr()->andX(
                                        $qb->expr()->eq("v.isMain", 0), $qb->expr()->eq("v.isFront", 1)
                        ))
                        ->orWhere($qb->expr()->andX(
                                        $qb->expr()->eq("v.isMain", 1), $qb->expr()->eq("v.isFront", 1), $qb->expr()->isNull("v.youtube")
                        ))
                
                ;
        
        return $query->getQuery()
                        ->execute();
        
        
    }

    public function getMainVideos() {
        return $this->createQueryBuilder("v")
                        ->andWhere("v.isMain = true")
                        ->andWhere("v.youtube is not null")
                        ->getQuery()
                        ->execute();
    }

    public function getVideos(Category $category = null) {
        $query = $this->createQueryBuilder("v");
        if ($category)
        {
            $query->where("v.category = :category");
            $query->setParameters(array(
                "category" => $category
            ));
        }
        return $query->getQuery()->execute();
    }

    public function getAllVideos() {
        return $this->createQueryBuilder("v")
                        ->innerJoin("v.category", "c")
                        ->getQuery()
                        ->execute();
    }

}
