<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
    public function picturesAction(){
        $repository = $this->getDoctrine()->getRepository('ProjectBundle:Book');
        for ($id = 0; $id <= 10; $id++) {
            $pictures[$id] = $repository->findPicture($id);
        }
        return $this->render('ProjectBundle:Default:collection.html.twig', [
            'pictures' => $pictures
        ]);
    }

    public function showAction(Request $request)
    {
        $slug = $request->get('slug');
        $repository = $this->getDoctrine()->getRepository('ProjectBundle:Book');
        $book = $repository->findOneBy([
            'slug' => $slug
        ]);

        return $this->render('ProjectBundle:Theme/Default:show.html.twig', [
            'book' => $book
        ]);
    }
}