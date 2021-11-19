<?php

namespace App\Controller;

use App\Entity\Pin;
use App\Repository\PinRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
// ? use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\Framework\HttpClient\DefaultOptions\RetryFailedConfig;

class PinsController extends AbstractController
{
    //old 2
    // private $em;

    // public function __construct(EntityManagerInterface $em)
    // {
    //     $this->em = $em;
    // }

    /**
     * @Route("/pins", name="app_pins", methods={"GET"})
     */
    public function index(PinRepository $repo): Response
    {
        //recupérer dans la bdd 
        // public function index(EntityManagerInterface $em): Response
        // + use App\Entity\Pin;
        // + use Doctrine\ORM\EntityManagerInterface;
        //V1
        //$repo = $em->getRepository('App\Entity\Pin');
        //V2
        //$repo = $em->getRepository(Pin::class);
        //V3 avec l'alias App dans doctrine.yaml
        //$repo = $em->getRepository('App:Pin');

        //$pins = $repo->findAll();
        
        // old1 :  $em = $this->getDoctrine()->getManager();

        // $pin = new Pin;
        // $pin->setTitle('titre 2');
        // $pin->setDescription('description 2');

        // old2
        // $this->em->persist($pin);
        // $this->em->flush();

        // old1 pour envoyer dans la bdd
        // $em->persist($pin);
        // $em->flush();

        //dump($pin);
        //dd($pin);
        // dump + die = dd;

        // return $this->render('pins/index.html.twig', [
        //     'controller_name' => 'PinsController',
        //     'pins' => $pins
        // ]);

        //Plus simple que ('pins' => $pins)
        //return $this->render('pins/index.html.twig',compact('pins'));

        return $this->render('pins/index.html.twig',['pins' => $repo->findAll()]);
    }

    /**
     * @Route("/pins/create",  name="app_pins_create", methods={"GET", "POST"})
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        //Créer le formulaire
        // ->add(nom_du_champ, type_du_champ(TexteType::class)) ajout des champs
        // ->getForm() pour le créer

        $form = $this->createFormBuilder()
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('submit', SubmitType::class, ['label' => 'Create Pin'])
            ->getForm()
        ;
        //Si POST elle récupère les données
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            //Récupérer les données du formulaire
            // Pour un champ $form->get('description')->getData();
            // ou $form->get['description']->getData();
            $data = $form->getData();
            //traitement 
            $pin = new Pin;
            $pin->setTitle($data['title']);
            $pin->setDescription($data['description']);

            $em->persist($pin);
            $em->flush();

            return $this->redirectToRoute('app_pins');
        }
        
        //$form->createView() pour passer la vue du formulaire
        return $this->render('pins/create.html.twig',[
            'monFormulaire' => $form->createView()
        ]);
        //V1 
        //Vérifie si on a du post
        // if ($request->isMethod('POST'))
        // {
        //     //traitement
        //     //post
        //     $data = $request->request->all();

        //     $pin = new Pin;
        //     //2 versions
        //     $pin->setTitle($request->request->get('title'));
        //     $pin->setDescription($data['description']);

        //     $em->persist($pin);
        //     $em->flush();

        //     //get
        //     //$request->query->all();

        //     //redirection

        //     //V1 return $this->redirect($this->generateUrl('app_pins'));
        //     // url externe return $this->redirect('https://google.com');
        //     return $this->redirectToRoute('app_pins');
        // }
        //return $this->render('pins/create.html.twig');
    }
}
