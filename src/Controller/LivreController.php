<?php

namespace App\Controller;

use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\BarChart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Livres;
use App\Entity\Vente;

class LivreController extends AbstractController
{
    /**
     * @Route("/livre", name="livre")
     * @Route("/livre/{id}", name="livre_show")
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



        $dataBar = [[ 'Categorie' , 'Prix' ]];
        foreach ($livres as $livre) {
            $dataBar[]=array(
            $livre['categorie'], (int)$livre['sumPrix']);
        }
        $bar = new BarChart();
        $bar->getData()->setArrayToDataTable($dataBar);


        $data = [[ 'Livre', 'vente' ]];
        foreach ($allVentes as $allVente) {
            $data[] = array(
            $allVente->getNom(), $allVente->getNbreVente()
        );
        }
        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable(
            $data
        );

        if (!$ventes && !$livres && $allVentes && $sumCatYears && $sumCatTots) {
            throw $this->createNotFoundException(
                'No results Found !! '
            );
        }

        return $this->render('test.html.twig', ['ventes'=>$ventes, 'livres'=>$livres,'allVentes'=>$allVentes,'sumCatYears'=>$sumCatYears,'sumCatTots'=>$sumCatTots,'piechart'=>$pieChart,'barchart'=>$bar]);
    }


    //work but must be in another controler for routes & functiun
    public function show($id)
    {
        $vente = $this->getDoctrine()
         ->getRepository(Vente::class)
         ->find($id);

        if (!$vente) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$vente->getNom());
    }
}
