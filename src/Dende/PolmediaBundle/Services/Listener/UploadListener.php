<?php
namespace Dende\PolmediaBundle\Services\Listener;

use Oneup\UploaderBundle\Event\PostPersistEvent;
use Dende\PolmediaBundle\Lib\Globals;

class UploadListener
{
    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function onUpload(PostPersistEvent $event)
    {
            $filename = $event->getFile()->getFilename();
        
            $response = $event->getResponse();
            $response["filename"] = $filename;
            $response["pathname"] = Globals::applyGalleryDir($filename);
            $response["thumbnail"] = Globals::applyThumbnailDir($filename);
            $response["mainImage"] = Globals::applyMainImageDir($filename);
            
    }
}