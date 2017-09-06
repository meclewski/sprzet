<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Efunction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Efunction controller.
 *
 * @Route("efunction")
 */
class EfunctionController extends Controller
{
    /**
     * Lists all efunction entities.
     *
     * @Route("/", name="efunction_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $efunctions = $em->getRepository('AppBundle:Efunction')->findAll();

        return $this->render('efunction/index.html.twig', array(
            'efunctions' => $efunctions,
        ));
    }

    /**
     * Creates a new efunction entity.
     *
     * @Route("/new", name="efunction_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $efunction = new Efunction();
        $form = $this->createForm('AppBundle\Form\EfunctionType', $efunction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($efunction);
            $em->flush();

            return $this->redirectToRoute('efunction_show', array('id' => $efunction->getId()));
        }

        return $this->render('efunction/new.html.twig', array(
            'efunction' => $efunction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a efunction entity.
     *
     * @Route("/{id}", name="efunction_show")
     * @Method("GET")
     */
    public function showAction(Efunction $efunction)
    {
        $deleteForm = $this->createDeleteForm($efunction);

        return $this->render('efunction/show.html.twig', array(
            'efunction' => $efunction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing efunction entity.
     *
     * @Route("/{id}/edit", name="efunction_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Efunction $efunction)
    {
        $deleteForm = $this->createDeleteForm($efunction);
        $editForm = $this->createForm('AppBundle\Form\EfunctionType', $efunction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('efunction_edit', array('id' => $efunction->getId()));
        }

        return $this->render('efunction/edit.html.twig', array(
            'efunction' => $efunction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a efunction entity.
     *
     * @Route("/{id}", name="efunction_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Efunction $efunction)
    {
        $form = $this->createDeleteForm($efunction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($efunction);
            $em->flush();
        }

        return $this->redirectToRoute('efunction_index');
    }

    /**
     * Creates a form to delete a efunction entity.
     *
     * @param Efunction $efunction The efunction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Efunction $efunction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('efunction_delete', array('id' => $efunction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
