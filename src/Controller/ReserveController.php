<?php

namespace App\Controller;

use App\Entity\Vente;
use App\Entity\TestReservation;
use App\Form\VenteType;
use App\Form\ReservationType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReserveController extends AbstractController
{
    /**
     * @Route("/reserve/{id}", name="reserve")
     */
     public function gestionStock($id)
     {

       $em = $this->getDoctrine()->getManager();
       $vente = $em->getRepository(Vente::class)->find($id);
       $nom = $vente->getNom();


        $venteType=new TestReservation;

        $form = $this->createForm(ReservationType::class, $venteType);

          if ($form->isSubmitted() && $form->isValid()) {
                  $venteType->setNom($nom);
                  $venteType->setVente($vente);
                  $venteType = $form->getData();
                  $entityManager = $this->getDoctrine()->getManager();
                  $entityManager->persist($venteType);
                  $entityManager->flush();
          }




return $this->render('reserve/index.html.twig',['vente'=>$vente,'form' => $form->createView()]);
      }



}
