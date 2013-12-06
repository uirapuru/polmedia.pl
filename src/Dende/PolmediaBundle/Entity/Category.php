<?php

namespace Dende\PolmediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="Dende\PolmediaBundle\Entity\CategoryRepository")
 */
class Category {
// <editor-fold defaultstate="collapsed" desc="fields">

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_number", type="integer")
     */
    private $orderNumber;

    /**
     * @ORM\OneToMany(targetEntity="Video", mappedBy="category")
     */
    private $videos; // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="setters and getters">

    public function getSlug() {
        return $this->slug;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
    }

    public function getVideos() {
        return $this->videos;
    }

    public function setVideos($videos) {
        $this->videos = $videos;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Category
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set orderNumber
     *
     * @param integer $orderNumber
     * @return Category
     */
    public function setOrderNumber($orderNumber) {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    /**
     * Get orderNumber
     *
     * @return integer 
     */
    public function getOrderNumber() {
        return $this->orderNumber;
    }

// </editor-fold>

    public function __toString() {
        return $this->getTitle();
    }

}
