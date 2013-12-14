<?php

namespace Dende\PolmediaBundle\Services\Listener;

use Oneup\UploaderBundle\Event\PostPersistEvent;

class ImageRescaleListener {

    public function __construct($doctrine) {
        $this->doctrine = $doctrine;
    }

    public function onUpload(PostPersistEvent $event) {
        $filename = $event->getFile()->getPathname();
        switch ($event->getType()) {
            case "mainImage":
                $image = new \Imagick($filename);
                $image->scaleImage(125, 200, true);
                $image->writeImage($filename);
                break;
            case "gallery":
                $image = new \Imagick($filename);
                $image->scaleImage(1024, 768, true);
                $image->writeImage($filename);
                                
                $thumbnail = new \Imagick($filename);
                $thumbnail->scaleImage(200, 200, true);
                $thumbnail->writeImage(str_replace("/gallery/", "/thumbnail/", $filename));
                break;
        }
    }

}
