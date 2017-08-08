<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
    public function indexAction()
    {
        $books = $this->get('project.repository.book')->findAll();
        return $this->render('ProjectBundle:Theme/Book:index.html.twig', [
            'books' => $books
        ]);
    }

    public function showAction(Request $request)
    {
        $slug = $request->get('slug');
        $repository = $this->getDoctrine()->getRepository('ProjectBundle:Book');
        $book = $repository->findOneBy([
            'slug' => $slug
        ]);
        return $this->showResourceAction($book);
    }

    public function showResourceAction($contentDocument)
    {
        return $this->render('ProjectBundle:Theme/Book:show.html.twig', [
            'book' => $contentDocument
        ]);
    }
}