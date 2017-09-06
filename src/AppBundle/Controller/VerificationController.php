<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Verification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Verification controller.
 *
 * @Route("verification")
 */
class VerificationController extends Controller
{
    /**
     * Lists all verification entities.
     *
     * @Route("/", name="verification_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $verifications = $em->getRepository('AppBundle:Verification')->findAll();

        return $this->render('verification/index.html.twig', array(
            'verifications' => $verifications,
        ));
    }

    /**
     * Creates a new verification entity.
     *
     * @Route("/new", name="verification_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $verification = new Verification();
        $form = $this->createForm('AppBundle\Form\VerificationType', $verification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($verification);
            $em->flush();

            return $this->redirectToRoute('verification_show', array('id' => $verification->getId()));
        }

        return $this->render('verification/new.html.twig', array(
            'verification' => $verification,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a verification entity.
     *
     * @Route("/{id}", name="verification_show")
     * @Method("GET")
     */
    public function showAction(Verification $verification)
    {
        $deleteForm = $this->createDeleteForm($verification);

        return $this->render('verification/show.html.twig', array(
            'verification' => $verification,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing verification entity.
     *
     * @Route("/{id}/edit", name="verification_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Verification $verification)
    {
        $deleteForm = $this->createDeleteForm($verification);
        $editForm = $this->createForm('AppBundle\Form\VerificationType', $verification);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('verification_edit', array('id' => $verification->getId()));
        }

        return $this->render('verification/edit.html.twig', array(
            'verification' => $verification,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a verification entity.
     *
     * @Route("/{id}", name="verification_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Verification $verification)
    {
        $form = $this->createDeleteForm($verification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($verification);
            $em->flush();
        }

        return $this->redirectToRoute('verification_index');
    }

    /**
     * Creates a form to delete a verification entity.
     *
     * @param Verification $verification The verification entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Verification $verification)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('verification_delete', array('id' => $verification->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
