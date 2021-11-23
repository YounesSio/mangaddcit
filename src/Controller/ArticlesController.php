<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use App\Entity\Article;
use App\Repository\ArticleRepository;

class ArticlesController extends AbstractController
{
    #[Route('/articles', name: 'articles')]
    public function index(ArticleRepository $repo): Response
    {
        // return $this->render('articles/index.html.twig', [
        //     'controller_name' => 'ArticlesController',
        // ]);
        return $this->render('articles/index.html.twig',['articles' => $repo->findAll()]);
    }

    /**
     * @Route("/article/{id}", name="article-show")
     */
    public function viewAction($id) {
        $article = $this->getDoctrine()->getRepository(Article::class);
        $article = $article->find($id);
        if (!$article) {
            throw $this->createNotFoundException(
                'Aucun article pour l\'id: ' . $id
            );
        }
        return $this->render(
            'articles/view.html.twig',
            array('article' => $article)
        );
    }
    // /**
    //  * @Route("/article/new")
    //  */
    // public function createAction(Request $request) {
    //     $article = new Article();
    //     $form = $this->createFormBuilder($article)
    //         ->add('name', TextType::class)
    //         ->add('author', TextType::class)
    //         ->add('description', TextType::class)
    //         ->add('picture', TextType::class)
    //         ->add('edition', TextType::class)
    //         ->add('editor', DateType::class)
    //         ->add('number', IntegerType::class)
    //         ->add('save', SubmitType::class, ['label' => 'Valider'])
    //         ->getForm();
    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $article = $form->getData();
    //         $em = $this->getDoctrine()->getManager();
    //         $em->persist($article);
    //         $em->flush();
    //         echo 'Envoyé';
    //     }
    //     return $this->render('articles/index.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }
}
