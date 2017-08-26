<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Equipment;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * List controller.
 *
 * @Route("list")
 */
class ListController extends Controller
{
    /**
     * Lists all equipment entities.
     *
     * @Route("/", name="list_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $current_user=$this->getUser();
        $id=$current_user->getId();
        //$equipment = $em->getRepository('AppBundle:Equipment')->findAll();
        //$user = $em->getRepository('AppBundle:User')->findAll();
        $query=$em->createQuery(
            'SELECT p FROM AppBundle:Equipment p WHERE p.userId='.$id.'' 
            );
        $equipment = $query->getResult();


        return $this->render('list/index.html.twig', array(
            'equipment' => $equipment,
        ));
    }
}