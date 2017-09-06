<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Producer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Producer controller.
 *
 * @Route("producer")
 */
class ProducerController extends Controller
{
    /**
     * Lists all producer entities.
     *
     * @Route("/", name="producer_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $producers = $em->getRepository('AppBundle:Producer')->findAll();

        return $this->render('producer/index.html.twig', array(
            'producers' => $producers,
        ));
    }

    /**
     * Creates a new producer entity.
     *
     * @Route("/new", name="producer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $producer = new Producer();
        $form = $this->createForm('AppBundle\Form\ProducerType', $producer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producer);
            $em->flush();

            return $this->redirectToRoute('producer_show', array('id' => $producer->getId()));
        }

        return $this->render('producer/new.html.twig', array(
            'producer' => $producer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a producer entity.
     *
     * @Route("/{id}", name="producer_show")
     * @Method("GET")
     */
    public function showAction(Producer $producer)
    {
        $deleteForm = $this->createDeleteForm($producer);

        return $this->render('producer/show.html.twig', array(
            'producer' => $producer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing producer entity.
     *
     * @Route("/{id}/edit", name="producer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Producer $producer)
    {
        $deleteForm = $this->createDeleteForm($producer);
        $editForm = $this->createForm('AppBundle\Form\ProducerType', $producer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('producer_edit', array('id' => $producer->getId()));
        }

        return $this->render('producer/edit.html.twig', array(
            'producer' => $producer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a producer entity.
     *
     * @Route("/{id}", name="producer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Producer $producer)
    {
        $form = $this->createDeleteForm($producer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($producer);
            $em->flush();
        }

        return $this->redirectToRoute('producer_index');
    }

    /**
     * Creates a form to delete a producer entity.
     *
     * @param Producer $producer The producer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Producer $producer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('producer_delete', array('id' => $producer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
