<?php

namespace App\Controller;

use \DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\ArticleRepository;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function home(ArticleRepository $repo) : Response
    {
        //$userName = dump($this->getUser()->getUsername());

        return $this->render('home/index.html.twig',['articles' => $repo->findAll()]);
        
    }
}
