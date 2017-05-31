<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('ProjectBundle:Author');
        $dbcontent = $repository->findBy([], ['name' => 'ASC']);

        if (!$dbcontent) {
            throw new \UnexpectedValueException('No Artist found in DB');
        } else {
            return $this->render('ProjectBundle:Default:authorlist.html.twig', array('authors' => $dbcontent));
        }
    }

}
