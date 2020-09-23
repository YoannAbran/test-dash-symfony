<?php

namespace App\Controller;

use App\Entity\Vente;
use App\Entity\TestReservation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    /**
     * @Route("/reservationliste", name="reservationliste")
     */
    
    public function getAllVente()
    {
    $allVentes = $this->getDoctrine()
                    ->getRepository(Vente::class)
                    ->findAll();

                    return $this->render('reservation/index.html.twig',['allVentes'=>$allVentes]);
    }


}
