<?php
/**
 * Created by PhpStorm.
 * User: gseidel
 * Date: 03.08.17
 * Time: 17:27
 */

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    public function indexAction()
    {
        $articles = $this->get('enhavo_article.repository.article')->findPublished();
        return $this->render('ProjectBundle:Theme/Blog:index.html.twig',[
            'articles' => $articles
        ]);
    }

    public function showAction(Request $request)
    {
        $slug = $request->get('slug');
        $repository = $this->getDoctrine()->getRepository('EnhavoArticleBundle:Article');
        $article = $repository->findOneBy([
            'slug' => $slug
        ]);
        return $this->showResourceAction($article);
    }

    public function showResourceAction($contentDocument)
    {
        return $this->render('ProjectBundle:Theme/Blog:show.html.twig', [
            'article' => $contentDocument
        ]);
    }
}