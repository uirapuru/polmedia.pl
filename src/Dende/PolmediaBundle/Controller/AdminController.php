<?php

namespace Dende\PolmediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Dende\PolmediaBundle\Entity\Video;
use Dende\PolmediaBundle\Entity\Category;
use Dende\PolmediaBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin")
 */
class AdminController extends Controller {

    /**
     * @Route("/", name="admin_main_page")
     * @Template()
     */
    public function mainPageAction() {
        return array();
    }

}
