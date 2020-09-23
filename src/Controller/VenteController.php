<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\VenteType;
use App\Entity\Vente;

class VenteController extends AbstractController
{
    /**
     * @Route("/vente", name="vente")
     */
    // public function index()
    // {
    //     return $this->render('vente/index.html.twig', [
    //         'controller_name' => 'VenteController',
    //     ]);
    // }

    public function new(Request $request)
  {
      // creates a vente object and initializes some data for this example
      $vente = new Vente();




      $form = $this->createForm(VenteType::class, $vente);
      $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$vente` variable has also been updated
        $vente = $form->getData();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($vente);
        $entityManager->flush();
}
      return $this->render('vente/index.html.twig', [
            'form' => $form->createView(),
        ]);


  }
}
