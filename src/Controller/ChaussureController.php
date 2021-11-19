<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Form\ChaussureType;
use App\Entity\Chaussure;
use App\Entity\Taille;

class ChaussureController extends AbstractController
{
    /**
     * @Route("/chaussure", name="home")
     */
    public function home(Request $request) : Response
    {
        $chaussureForm = $this->createForm(ChaussureType::class, $this->creerChaussure());
        $chaussureForm->handleRequest($request);
        if ($chaussureForm->isSubmitted() && $chaussureForm->isValid()) {
            dump($chaussureForm->getData());
        }
        return $this->render('chaussure/chaussure.html.twig', [
            'shoe' => $chaussureForm->createView(),
        ]);
    }

    private function creerChaussure() : Chaussure
    {
        $chaussure = new Chaussure();
        $chaussure->setNom('Vanez')
            ->setDescription('Une belle description de chaussure')
            ->setPrix('25')
        ;

        $chaussure->setTailles([
            new Taille(37.5),
            new Taille(38),
            new Taille(39),
            new Taille(40),
        ]);

        return $chaussure;
    }
}
