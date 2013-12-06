<?php

namespace Dende\PolmediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="images")
 * @ORM\Entity(repositoryClass="Dende\PolmediaBundle\Entity\ImageRepository")
 */
class Image {

    public $imageFile;
    public $thumbFile;

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
        return $this->url;
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
        return $this->thumbnail;
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

}
