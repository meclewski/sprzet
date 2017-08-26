<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Equipment;
use AppBundle\Entity\Etype;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Etype controller.
 *
 * @Route("etype")
 */
class EtypeController extends Controller
{
    /**
     * Lists all etype entities.
     *
     * @Route("/", name="etype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etypes = $em->getRepository('AppBundle:Etype')->findAll();

        return $this->render('etype/index.html.twig', array(
            'etypes' => $etypes,
        ));
    }

    /**
     * Creates a new etype entity.
     *
     * @Route("/new", name="etype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $etype = new Etype();
        $form = $this->createForm('AppBundle\Form\EtypeType', $etype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etype);
            $em->flush();

            return $this->redirectToRoute('etype_show', array('id' => $etype->getId()));
        }

        return $this->render('etype/new.html.twig', array(
            'etype' => $etype,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a etype entity.
     *
     * @Route("/{id}", name="etype_show")
     * @Method("GET")
     */
    public function showAction(Etype $etype)
    {
        $deleteForm = $this->createDeleteForm($etype);

        return $this->render('etype/show.html.twig', array(
            'etype' => $etype,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing etype entity.
     *
     * @Route("/{id}/edit", name="etype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Etype $etype)
    {
        $deleteForm = $this->createDeleteForm($etype);
        $editForm = $this->createForm('AppBundle\Form\EtypeType', $etype);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etype_edit', array('id' => $etype->getId()));
        }

        return $this->render('etype/edit.html.twig', array(
            'etype' => $etype,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a etype entity.
     *
     * @Route("/{id}", name="etype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Etype $etype)
    {
        $form = $this->createDeleteForm($etype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etype);
            $em->flush();
        }

        return $this->redirectToRoute('etype_index');
    }

    /**
     * Creates a form to delete a etype entity.
     *
     * @param Etype $etype The etype entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etype $etype)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etype_delete', array('id' => $etype->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
