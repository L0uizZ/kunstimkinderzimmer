<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


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
    public function contactAction()
    {
        return $this->render('ProjectBundle:Default:contact.html.twig');
    }
    public function imagesAction($id)
    {
        $em = $this->get('doctrine')->getManager();
        $image_obj = $em->getRepository('ProjectBundle:Book')->find($id);
        return new Response(
            $image_obj->getImg(),
            Response::HTTP_OK,
            array('content-type' => 'image/jpeg'));
    }
}
