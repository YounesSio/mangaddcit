<?php

namespace App\Controller;

use \DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function home(Request $request) : Response
    {
        //$userName = dump($this->getUser()->getUsername());

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController'
        ]);
        
    }
}
