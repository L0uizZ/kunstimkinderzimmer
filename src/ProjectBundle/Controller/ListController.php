<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;

class ListController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('ProjectBundle:Author');
        $dbcontent = $repository->findAll();

        if (!$dbcontent) {
            throw new \UnexpectedValueException('No Artist found in DB');
        } else {
            return $this->render('ProjectBundle:Default:authorlist.html.twig', array('authors' => $dbcontent));
        }
    }

}
