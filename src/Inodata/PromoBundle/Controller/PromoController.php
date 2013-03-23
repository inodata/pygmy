<?php

namespace Inodata\PromoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Inodata\PromoBundle\Entity\Promo;
use Inodata\PromoBundle\Form\PromoType;

/**
 * Promo controller.
 *
 * @Route("/promo")
 */
class PromoController extends Controller
{
    /**
     * Lists all Promo entities.
     *
     * @Route("/", name="promo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InodataPromoBundle:Promo')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Promo entity.
     *
     * @Route("/", name="promo_create")
     * @Method("POST")
     * @Template("InodataPromoBundle:Promo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Promo();
        $form = $this->createForm(new PromoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('promo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Promo entity.
     *
     * @Route("/new", name="promo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Promo();
        $form   = $this->createForm(new PromoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Promo entity.
     *
     * @Route("/{id}", name="promo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InodataPromoBundle:Promo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Promo entity.
     *
     * @Route("/{id}/edit", name="promo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InodataPromoBundle:Promo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promo entity.');
        }

        $editForm = $this->createForm(new PromoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Promo entity.
     *
     * @Route("/{id}", name="promo_update")
     * @Method("PUT")
     * @Template("InodataPromoBundle:Promo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InodataPromoBundle:Promo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PromoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('promo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Promo entity.
     *
     * @Route("/{id}", name="promo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InodataPromoBundle:Promo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Promo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('promo'));
    }

    /**
     * Creates a form to delete a Promo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
