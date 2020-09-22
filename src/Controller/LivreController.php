<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livres;
use App\Entity\Vente;

class LivreController extends AbstractController
{
    /**
     * @Route("/livre", name="livre")
     */
     public function showGraphData()
 {

    $allVentes = $this->getDoctrine()
                    ->getRepository(Vente::class)
                    ->findAll();

     $ventes = $this->getDoctrine()
                   ->getRepository(Vente::class)
                   ->getTotalVente();

    $livres = $this->getDoctrine()
                   ->getRepository(Livres::class)
                   ->getSumCat();
    $sumCatYears = $this->getDoctrine()
                   ->getRepository(Livres::class)
                   ->getSumCatYear();
    $sumCatTots= $this->getDoctrine()
                   ->getRepository(Livres::class)
                   ->getSumCatTotalYear();



     if (!$ventes && !$livres && $allVentes && $sumCatYears && $sumCatTots) {
         throw $this->createNotFoundException(
             'No results Found !! '
         );
     }

 return $this->render('test.html.twig',['ventes'=>$ventes, 'livres'=>$livres,'allVentes'=>$allVentes,'sumCatYears'=>$sumCatYears,'sumCatTots'=>$sumCatTots]);
}
//      public function showSumCat()
//  {
//      $livres = $this->getDoctrine()
//                    ->getRepository(Livres::class)
//                    ->getSumCat();
//
//
//      if (!$livres) {
//          throw $this->createNotFoundException(
//              'No livres found for id '
//          );
//      }
//
//  return $this->render('test.html.twig',['livres'=>$livres]);
// }

}
