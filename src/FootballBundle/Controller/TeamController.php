<?php

namespace FootballBundle\Controller;

use FootballBundle\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Team controller.
 *
 */
class TeamController extends DefaultController
{
    /**
     * Lists all team entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $teams = $em->getRepository('FootballBundle:Team')->findAll();

        return $this->JsonResponse($teams);

    }

    /**
     * Creates a new team entity.
     *
     */
    public function newAction(Request $request)
    {

        $team = new Team();
        $form = $this->createForm('FootballBundle\Form\TeamType', $team);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();

            return $this->JsonResponse($team);

        }

        echo (string) $form->getErrors(true, false);
        return $this->JsonResponse($team);

        return $this->JsonResponse($form->getErrors(true, false), 500);

    }

    /**
     * Finds and displays a team entity.
     *
     */
    public function showAction(Team $team)
    {
        return $this->JsonResponse($team);
    }

    /**
     * Displays a form to edit an existing team entity.
     *
     */
    public function editAction(Request $request, Team $team)
    {
        $editForm = $this->createForm('FootballBundle\Form\TeamType', $team);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->JsonResponse($team);
        }

        return $this->JsonResponse('Internal Error', 500);

    }

    /**
     * Deletes a team entity.
     *
     */
    public function deleteAction(Request $request, Team $team)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($team);
        $em->flush();

        return $this->JsonResponse('Deleted');
    }

}
