<?php

namespace Dende\PolmediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Dende\PolmediaBundle\Entity\Video;
use Dende\PolmediaBundle\Entity\Category;

class DefaultController extends Controller {

    /**
     * @Route("/", name="main_page")
     * @Template()
     */
    public function mainPageAction() {
        $promotedVideos = $this->get("video_repository")->getPromotedVideos();

        return array(
            "promotedVideos" => $promotedVideos
        );
    }

    /**
     * @Route("/categories", name="categories")
     * @Template()
     */
    public function categoriesAction() {
        $categories = $this->get("category_repository")->getAllCategories();

        return array(
            "categories" => $categories
        );
    }

    /**
     * @Route("/category/{id}", requirements={"id" = "\d+"}, name="category")
     * @ParamConverter("category", class="PolmediaBundle:Category")
     * @Template()
     */
    public function categoryAction(Category $category) {
        $videos = $this->get("video_repository")->getVideos($category);

        return array(
            "videos" => $videos,
            "category" => $category
        );
    }

    /**
     * @Route("/contact", name="contact")
     * @Template()
     */
    public function contactAction() {
        return array();
    }

    /**
     * @Route("/video/{id}", requirements={"id" = "\d+"}, name="video")
     * @ParamConverter("video", class="PolmediaBundle:Video")
     * @Template()
     */
    public function videoAction(Video $video) {
        return array(
            "video" => $video
        );
    }

    /**
     * @Route("/static/{slug}", name="static")
     * @Template()
     */
    public function staticAction($slug) {
        return array();
    }

}
