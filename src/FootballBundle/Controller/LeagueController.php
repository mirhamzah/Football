<?php

namespace FootballBundle\Controller;

use FootballBundle\Entity\League;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * League controller.
 *
 */
class LeagueController extends DefaultController
{
    /**
     * Lists all league entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $leagues = $em->getRepository('FootballBundle:League')->findAll();

        return $this->JsonResponse($leagues);
    }

    /**
     * Creates a new league entity.
     *
     */
    public function newAction(Request $request)
    {
        $league = new League();
        $form = $this->createForm('FootballBundle\Form\LeagueType', $league);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($league);
            $em->flush();

            return $this->JsonResponse($league);
        }

        return $this->JsonResponse('Internal Error', 500);

    }

    /**
     * Finds and displays a league entity.
     *
     */
    public function showAction(League $league)
    {
        return $this->JsonResponse($league);
    }

    /**
     * Displays a form to edit an existing league entity.
     *
     */
    public function editAction(Request $request, League $league)
    {
        $deleteForm = $this->createDeleteForm($league);
        $editForm = $this->createForm('FootballBundle\Form\LeagueType', $league);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->JsonResponse($league); 
        }

        return $this->JsonResponse('Internal Error', 500);

    }

    /**
     * Deletes a league entity.
     *
     */
    public function deleteAction(Request $request, League $league)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($league);
        $em->flush();

        return $this->JsonResponse('Deleted');
    }

}
