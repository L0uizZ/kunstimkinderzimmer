<?php

namespace ProjectBundle\Controller;

use Enhavo\Bundle\AppBundle\Controller\AppController;

class BookController extends AppController{

    public function createAction()
    {

    }
    public function readAction()
    {

    }
    public function updateAction()
    {

    }
    public function deleteAction()
    {

    }
    public function picturesAction(){
        $repository = $this->getDoctrine()->getRepository('ProjectBundle:Book');
        for ($id = 0; $id <= 10; $id++) {
            $pictures[$id] = $repository->findPicture($id);
        }
        return $this->render('ProjectBundle:Default:collection.html.twig', [
            'pictures' => $pictures
        ]);
    }
}