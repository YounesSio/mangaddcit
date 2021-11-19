<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyAccountController extends AbstractController
{
    #[Route('/my/account', name: 'my_account')]
    public function index(): Response
    {
        // Pour récupérer l'utilisateur courant
        dd($this->getUser());
        //Créer un formulaire à partir du getUser
        return $this->render('my_account/index.html.twig');

        //return $this->render('my_account/index.html.twig',['user' => $repo->findAll()]);
    }
}
