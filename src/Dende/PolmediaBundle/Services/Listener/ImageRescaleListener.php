<?php

namespace Dende\PolmediaBundle\Services\Listener;

use Oneup\UploaderBundle\Event\PostPersistEvent;
use Dende\PolmediaBundle\Lib\Globals;

class ImageRescaleListener {

    public function __construct($doctrine) {
        $this->doctrine = $doctrine;
    }

    public function onUpload(PostPersistEvent $event) {
        $filepath = $event->getFile()->getPathname();
        switch ($event->getType()) {
            case "mainImage":
                $image = new \Imagick($filepath);
                $image->scaleImage(1024, 768, true);
                $image->writeImage($filepath);

                $image->scaleImage(200, 200, true);
                $thumbnailFilename = Globals::convertMainPathToThumbnailPath($filepath);
                $image->writeImage($thumbnailFilename);

                break;
            case "gallery":
                $image = new \Imagick($filepath);
                $image->scaleImage(1024, 768, true);
                $image->writeImage($filepath);

                $thumbnail = new \Imagick($filepath);
                $thumbnail->scaleImage(200, 200, true);
                $thumbnailFilename = Globals::convertGalleryPathToThumbnailPath($filepath);
                $thumbnail->writeImage($thumbnailFilename);
                break;
        }
    }

}
