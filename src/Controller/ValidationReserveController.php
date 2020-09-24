<?php

namespace App\Controller;

use App\Entity\Vente;
use App\Entity\TestReservation;
use App\Controller\VenteController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ValidationReserveType;
use Symfony\Component\HttpFoundation\Request;

class ValidationReserveController extends AbstractController
{
    /**
     * @Route("/validationReserve/{id}", name="validationReserve")
     */
    public function validation(Request $request,$id)
    {
      $em = $this->getDoctrine()->getManager();
      $vente = $em->getRepository(Vente::class)->find($id);
      $stock = $vente->getStock();
      $nbreVente = $vente->getNbreVente();


      $reserve = $em->getRepository(TestReservation::class)->find($id);
      // $dateReserve = $reserve->getDateReserve();
      // $dateFin = $reserve->getDateFin();
      // $venteReserve =$reserve->getVente();



$form = $this->createForm(ValidationReserveType::class);
$form->handleRequest($request);
if ($form->get('valid')->isClicked()){
  if ($form->isSubmitted() && $form->isValid()) {
    $entityManager = $this->getDoctrine()->getManager();
    $vente->setNbreVente($nbreVente+1);
    $entityManager->flush();
    return $this->redirectToRoute('reservationliste');
  }
}
else if ($form->get('cancel')->isClicked()){
  if ($form->isSubmitted() && $form->isValid()) {
    $entityManager = $this->getDoctrine()->getManager();
    $vente->setStock($stock+1);
    // $vente->setNbreVente($nbreVente+1);
    $entityManager->flush();
    return $this->redirectToRoute('reservationliste');
  }
}
        return $this->render('validationReserve/index.html.twig', [
            'form'=>$form->createView(),
        ]);
    }
}
