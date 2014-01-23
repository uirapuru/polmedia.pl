<?php

namespace Dende\PolmediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dende\PolmediaBundle\Lib\Globals;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTime;

/**
 * Video
 *
 * @ORM\Table(name="videos")
 * @ORM\Entity(repositoryClass="Dende\PolmediaBundle\Entity\VideoRepository")
 */
class Video {

    const TYPE_HEADER = 'header';
    const TYPE_FRONT = 'front';
    const TYPE_NONE = null;

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
     * @ORM\Column(name="title", type="string", length=255, nullable = false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="directors_name", type="string", length=255, nullable = true)
     */
    private $directorsName;

    /**
     * @var string
     *
     * @ORM\Column(name="production_year", type="string", length=4, nullable = true)
     */
    private $productionYear;

    /**
     * @var string
     *
     * @ORM\Column(name="cast", type="string", length=4000, nullable = true)
     */
    private $cast;

    /**
     * @var string
     *
     * @ORM\Column(name="duration", type="string", length=4, nullable = true)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="prizes", type="string", length=4000, nullable = true)
     */
    private $prizes;

    /**
     * @var string
     *
     * @ORM\Column(name="plot", type="string", length=10000, nullable = false)
     */
    private $plot;

    /**
     * @var string
     *
     * @ORM\Column(name="youtube", type="string", length=255, nullable = true)
     */
    private $youtube;

    /**
     * @var string
     * @ORM\Column(type="string", columnDefinition="enum('header','front')", name="video_type", type="string", nullable = true)
     */
    private $type;

    /**
     * @var integer
     * 
     * @ORM\ManyToOne(targetEntity="Dende\PolmediaBundle\Entity\Category", inversedBy="videos",cascade={"persist"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $category;

    /**
     *
     * @ORM\OneToMany(targetEntity="Image", mappedBy="video")
     */
    private $images;

    /**
     * @var string
     *
     * @ORM\Column(name="main_image_url", type="string", length=255, nullable = false)
     */
    private $mainImage = "noMainImage.png";

    /**
     * @var integer 
     * @ORM\Column(name="video_order", type="integer", nullable = true)
     */
    private $order;

    /**
     * @var string
     * @Gedmo\Slug(fields={"title"}, updatable=true, separator="-", unique=true)
     * @ORM\Column(name="title_slug", type="string", nullable=false)
     */
    private $titleSlug;

    /**
     * @var DateTime $created
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var DateTime $modified
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * @var Datetime $deletedAt
     *
     * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
     */
    private $deletedAt;

// </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="setters and getters">

    public function getTitleSlug() {
        return $this->titleSlug;
    }

    public function getCreated() {
        return $this->created;
    }

    public function getModified() {
        return $this->modified;
    }

    public function getDeletedAt() {
        return $this->deletedAt;
    }

    public function setTitleSlug($titleSlug) {
        $this->titleSlug = $titleSlug;
    }

    public function setCreated(DateTime $created) {
        $this->created = $created;
    }

    public function setModified(DateTime $modified) {
        $this->modified = $modified;
    }

    public function setDeletedAt(Datetime $deletedAt) {
        $this->deletedAt = $deletedAt;
    }

    public function getOrder() {
        return $this->order;
    }

    public function setOrder($order) {
        $this->order = $order;
    }

    public function getMainImage() {
        return Globals::applyMainImageDir($this->mainImage);
    }

    public function setMainImage($mainImage) {
        $this->mainImage = $mainImage;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
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
     * @return Video
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
     * Set directorsName
     *
     * @param string $directorsName
     * @return Video
     */
    public function setDirectorsName($directorsName) {
        $this->directorsName = $directorsName;

        return $this;
    }

    /**
     * Get directorsName
     *
     * @return string 
     */
    public function getDirectorsName() {
        return $this->directorsName;
    }

    /**
     * Set productionYear
     *
     * @param string $productionYear
     * @return Video
     */
    public function setProductionYear($productionYear) {
        $this->productionYear = $productionYear;

        return $this;
    }

    /**
     * Get productionYear
     *
     * @return string 
     */
    public function getProductionYear() {
        return $this->productionYear;
    }

    /**
     * Set cast
     *
     * @param string $cast
     * @return Video
     */
    public function setCast($cast) {
        $this->cast = $cast;

        return $this;
    }

    /**
     * Get cast
     *
     * @return string 
     */
    public function getCast() {
        return $this->cast;
    }

    /**
     * Set duration
     *
     * @param string $duration
     * @return Video
     */
    public function setDuration($duration) {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string 
     */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * Set prizes
     *
     * @param string $prizes
     * @return Video
     */
    public function setPrizes($prizes) {
        $this->prizes = $prizes;

        return $this;
    }

    /**
     * Get prizes
     *
     * @return string 
     */
    public function getPrizes() {
        return $this->prizes;
    }

    /**
     * Set plot
     *
     * @param string $plot
     * @return Video
     */
    public function setPlot($plot) {
        $this->plot = $plot;

        return $this;
    }

    /**
     * Get plot
     *
     * @return string 
     */
    public function getPlot() {
        return $this->plot;
    }

    /**
     * Set youtube
     *
     * @param string $youtube
     * @return Video
     */
    public function setYoutube($youtube) {
        $this->youtube = $youtube;

        return $this;
    }

    /**
     * Get youtube
     *
     * @return string 
     */
    public function getYoutube() {
        return $this->youtube;
    }

    public function getThumbnail() {
        return Globals::convertMainPathToThumbnailPath($this->getMainImage());
    }

    public function getImages() {
        return $this->images;
    }

    public function setImages($images) {
        $this->images = $images;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        if (!in_array($type, array(self::TYPE_HEADER, self::TYPE_FRONT, self::TYPE_NONE)))
        {
            throw new \InvalidArgumentException("Invalid type");
        }
        $this->type = $type;
    }

// </editor-fold>

    public function __toString() {
        return $this->getTitle();
    }

}
