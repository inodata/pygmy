<?php

namespace Inodata\PromoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Inodata\PromoBundle\Entity\Promocode;
use Inodata\PromoBundle\Form\PromocodeType;

/**
 * Promocode controller.
 *
 * @Route("/promocode")
 */
class PromocodeController extends Controller
{
    /**
     * Lists all Promocode entities.
     *
     * @Route("/", name="promocode")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InodataPromoBundle:Promocode')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Promocode entity.
     *
     * @Route("/", name="promocode_create")
     * @Method("POST")
     * @Template("InodataPromoBundle:Promocode:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Promocode();
        $form = $this->createForm(new PromocodeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('promocode_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Promocode entity.
     *
     * @Route("/new", name="promocode_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Promocode();
        $form   = $this->createForm(new PromocodeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Promocode entity.
     *
     * @Route("/{id}", name="promocode_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InodataPromoBundle:Promocode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promocode entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Promocode entity.
     *
     * @Route("/{id}/edit", name="promocode_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InodataPromoBundle:Promocode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promocode entity.');
        }

        $editForm = $this->createForm(new PromocodeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Promocode entity.
     *
     * @Route("/{id}", name="promocode_update")
     * @Method("PUT")
     * @Template("InodataPromoBundle:Promocode:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InodataPromoBundle:Promocode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promocode entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PromocodeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('promocode_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Promocode entity.
     *
     * @Route("/{id}", name="promocode_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InodataPromoBundle:Promocode')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Promocode entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('promocode'));
    }

    /**
     * Creates a form to delete a Promocode entity by id.
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
