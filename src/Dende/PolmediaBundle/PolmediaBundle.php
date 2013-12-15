<?php

namespace Dende\PolmediaBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Dende\PolmediaBundle\Lib\Globals;

class PolmediaBundle extends Bundle {

    public function boot() {
        parent::boot();
        
        Globals::setMainImageDir($this->container->getParameter('polmedia.mainImageDir'));
        Globals::setThumbnailDir($this->container->getParameter('polmedia.thumbnailDir'));
        Globals::setGalleryDir($this->container->getParameter('polmedia.galleryDir'));
    }

}
