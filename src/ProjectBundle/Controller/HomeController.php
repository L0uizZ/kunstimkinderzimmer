<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function locateAction(Request $request)
    {
        $locale = $request->getLocale();
        $allowedLocales = ['de', 'en'];
        if(!in_array($locale, $allowedLocales)) {
            $locale = 'en';
        }
        return $this->redirectToRoute(sprintf('project_theme_home_index_%s', $locale));
    }

    public function indexAction()
    {
        $books =  $this->get('project.repository.book')->findAll();

        return $this->render('ProjectBundle:Theme/Home:index.html.twig', [
            'books' => $books
        ]);
    }

    public function contactAction()
    {
        return $this->render('ProjectBundle:Theme/Home:contact.html.twig');
    }
}