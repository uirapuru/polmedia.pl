<?php

namespace Dende\PolmediaBundle\Services\Listener;

use Oneup\UploaderBundle\Event\PostPersistEvent;

class ImageRescaleListener {

    public function __construct($doctrine) {
        $this->doctrine = $doctrine;
    }

    public function onUpload(PostPersistEvent $event) {
        $filename = $event->getFile()->getPathname();
        $image = new \Imagick($filename);
        $image->scaleImage(200, 240, true);
        $image->writeImage($filename);
    }

}