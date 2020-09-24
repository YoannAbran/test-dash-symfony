<?php

namespace App\Controller;

use App\Entity\Livres;
use App\Entity\Vente;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InsertVenteController extends AbstractController
{
    /**
     * @Route("/insertVente", name="insertVente")
     */
    public function insertVenteControl(){
    $em = $this->getDoctrine()->getManager();
    $vente = $em->getRepository(Vente::class)->findAll();
    $totalVente = $em->getRepository(Vente::class)->getTotalVente();
    $livres = $em->getRepository(Livres::class)->findAll();
    $totalLivres = $em->getRepository(Livres::class)->getStock();



  // code...




    $insertVente = new Vente;
foreach ($totalLivres as $totalLivre) {
    $stock = $totalLivre['nomS'];
    $prixVente = $totalLivre['prixMoy']+4;
    $nomVente = $totalLivre['nom'];
    $insertVente->setNom($nomVente);
    $insertVente->setPrixVente($prixVente);
    $insertVente->setStock($stock);
    $insertVente->setNbreVente(10);
    // $em->persist($insertVente);
    $em->flush();
  }
    return $this->redirectToRoute('reservationliste');
    }
}
