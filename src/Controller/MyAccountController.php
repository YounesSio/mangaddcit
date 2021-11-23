<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Form\MyAccountFormType;

class MyAccountController extends AbstractController
{
    #[Route('/my/account', name: 'my_account')]
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // Pour récupérer l'utilisateur courant
        //dd($this->getUser());
        $user = $this->getUser();
        //Maj du user
        $form = $this->createForm(MyAccountFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }

        //return $this->render('my_account/index.html.twig');
        return $this->render('my_account/index.html.twig',[
            'user' => $user,
            'myAccountForm' => $form->createView()
            ]);

        //return $this->render('my_account/index.html.twig',['user' => $repo->findAll()]);
    }
}
