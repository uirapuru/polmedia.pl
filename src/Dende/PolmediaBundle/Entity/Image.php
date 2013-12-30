<?php

namespace Dende\PolmediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dende\PolmediaBundle\Lib\Globals;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTime;

/**
 * Image
 *
 * @ORM\Table(name="images")
 * @ORM\Entity(repositoryClass="Dende\PolmediaBundle\Entity\ImageRepository")
 */
class Image {
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail", type="string", length=255)
     */
    private $thumbnail;

    /**
     * @var integer
     * 
     * @ORM\ManyToOne(targetEntity="Dende\PolmediaBundle\Entity\Video", inversedBy="images",cascade={"persist"})
     * @ORM\JoinColumn(name="video_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $video;

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

    public function getCreated() {
        return $this->created;
    }

    public function getModified() {
        return $this->modified;
    }

    public function getDeletedAt() {
        return $this->deletedAt;
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

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Image
     */
    public function setUrl($url) {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl() {
        return Globals::applyGalleryDir($this->url);
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     * @return Image
     */
    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get thumbnail
     *
     * @return string 
     */
    public function getThumbnail() {
        return Globals::applyThumbnailDir($this->thumbnail);
    }

    /**
     * Set videoId
     *
     * @param integer $videoId
     * @return Image
     */
    public function setVideoId($videoId) {
        $this->videoId = $videoId;

        return $this;
    }

    /**
     * Get videoId
     *
     * @return integer 
     */
    public function getVideoId() {
        return $this->videoId;
    }

    public function getVideo() {
        return $this->video;
    }

    public function setVideo($video) {
        $this->video = $video;
    }

// </editor-fold>
}
