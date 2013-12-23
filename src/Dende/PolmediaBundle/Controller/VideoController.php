<?php

namespace Dende\PolmediaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Dende\PolmediaBundle\Entity\Video;
use Dende\PolmediaBundle\Form\VideoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Video controller.
 *
 * @Route("/admin/video")
 */
class VideoController extends Controller {

    /**
     * Lists all Video entities.
     *
     * @Route("/", name="admin_video")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('PolmediaBundle:Video')->getAllVideos();
        return array(
            'entities' => $entities,
        );
    }

    /**
     * @Route("/{id}/update-order/{order}", name="admin_video_updateOrder")
     * @ParamConverter("Video", class="PolmediaBundle:Video")
     * @Method("POST")
     */
    public function updateOrderAction(Video $video, $order) {
        $em = $this->getDoctrine()->getManager();
        $video->setOrder($order);
        $em->persist($video);
        $em->flush();
        return new \Symfony\Component\HttpFoundation\Response("ok", 200);
    }

    /**
     * Creates a new Video entity.
     *
     * @Route("/", name="admin_video_create")
     * @Method("POST")
     * @Template("PolmediaBundle:Video:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Video();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_video_show', array(
                                'id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Video entity.
     *
     * @param Video $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Video $entity) {
        $uploaderHelper = $this->container->get('oneup_uploader.templating.uploader_helper');

        $form = $this->createForm(new VideoType($uploaderHelper), $entity, array(
            'action' => $this->generateUrl('admin_video_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Video entity.
     *
     * @Route("/new", name="admin_video_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Video();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Video entity.
     *
     * @Route("/{id}", name="admin_video_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PolmediaBundle:Video')->find($id);

        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Video entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Video entity.
     *
     * @Route("/{id}/edit", name="admin_video_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PolmediaBundle:Video')->find($id);

        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Video entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Video entity.
     *
     * @param Video $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Video $entity) {
        $uploaderHelper = $this->container->get('oneup_uploader.templating.uploader_helper');

        $form = $this->createForm(new VideoType($uploaderHelper), $entity, array(
            'action' => $this->generateUrl('admin_video_update', array('id' => $entity->getId())),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Video entity.
     *
     * @Route("/{id}", name="admin_video_update")
     * @Method("POST")
     * @Template("PolmediaBundle:Video:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PolmediaBundle:Video')->find($id);

        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Video entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid())
        {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_video_edit', array(
                                'id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Video entity.
     *
     * @Route("/{id}", name="admin_video_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PolmediaBundle:Video')->find($id);

            if (!$entity)
            {
                throw $this->createNotFoundException('Unable to find Video entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_video'));
    }

    /**
     * Creates a form to delete a Video entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_video_delete', array(
                                    'id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
