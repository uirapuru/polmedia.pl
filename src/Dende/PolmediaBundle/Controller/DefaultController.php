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
            "videos"   => $videos,
            "category" => $category
        );
    }

    /**
     * @Route("/contact", name="contact")
     * @Template()
     */
    public function contactAction(Request $request) {
        $form = $this->createForm(new ContactType());

        if ($request->isMethod('POST'))
        {
            $form->bind($request);

            if ($form->isValid())
            {
                $message = \Swift_Message::newInstance()
                        ->setSubject($form->get('subject')->getData())
                        ->setFrom($form->get('email')->getData())
                        ->setTo('contact@example.com')
                        ->setBody(
                        $this->renderView(
                                'PolmediaBundle:Mail:contact.html.twig', array(
                            'ip'      => $request->getClientIp(),
                            'name'    => $form->get('name')->getData(),
                            'message' => $form->get('message')->getData()
                                )
                        )
                );

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('success', 'Your email has been sent! Thanks!');

                return $this->redirect($this->generateUrl('contact'));
            }
        }

        return array(
            "form" => $form->createView()
        );
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
