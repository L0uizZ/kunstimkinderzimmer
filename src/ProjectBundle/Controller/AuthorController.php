<?php

namespace ProjectBundle\Controller;

use Enhavo\Bundle\AppBundle\Controller\AppController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthorController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('ProjectBundle:Author');
        $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        foreach(str_split($letters) as $letter) {
            $authorData = $repository->findWithStartLetter($letter);
            if($authorData) {
                $authors[$letter] = $authorData;
            }
        }

        return $this->render('ProjectBundle:Theme/Author:index.html.twig', [
            'authors' => $authors
        ]);
    }
}