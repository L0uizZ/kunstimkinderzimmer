<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListController extends Controller
{


    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('ProjectBundle:Author');
        $dbcontent = $repository;
        $authors = $dbcontent->findBy(array(),array('name' => 'ASC'));

        $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        foreach(str_split($letters) as $letter) {
            $firstLetter = $letter;
        }
        $query = $this->createQueryBuilder('n');
        $query->andWhere('n.name LIKE :firstLetter');
        $query->setParameter('firstLetter', $firstLetter.'%');
        return $query->getQuery()->getResult();



        if (!$dbcontent) {
            throw new \UnexpectedValueException('No Artist found in DB');
        } else {
            return $this->render('ProjectBundle:Default:authorlist.html.twig', array('authors' => $string));
        }
    }

}
