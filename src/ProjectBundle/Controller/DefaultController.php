<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $books =  $this->get('project.repository.book')->findBy([]);
        return $this->render('ProjectBundle:Theme/Default:index.html.twig', [
            'books' => $books
        ]);
    }

    public function collectionAction()
    {
        $books =  $this->get('project.repository.book')->findBy([]);
        return $this->render('ProjectBundle:Theme/Default:collection.html.twig', [
            'books' => $books
        ]);
    }

    public function blogAction()
    {
        return $this->render('ProjectBundle:Theme/Default:blog.html.twig');
    }

    public function contactAction()
    {
        return $this->render('ProjectBundle:Theme/Default:contact.html.twig');
    }
}
