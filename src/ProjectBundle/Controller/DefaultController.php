<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProjectBundle:Default:index.html.twig');
    }
    public function collectionAction()
    {
        return $this->render('ProjectBundle:Default:collection.html.twig');
    }
    public function blogAction()
    {
        return $this->render('ProjectBundle:Default:blog.html.twig');
    }

}
