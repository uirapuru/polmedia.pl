<?php
namespace Dende\PolmediaBundle\Services\Listener;

use Oneup\UploaderBundle\Event\PostPersistEvent;

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
            $response["pathname"] = "/uploads/gallery/".$filename;
            $response["filename"] = $filename;
    }
}