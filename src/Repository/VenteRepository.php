<?php

namespace App\Repository;

use App\Entity\Vente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vente[]    findAll()
 * @method Vente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vente::class);
    }

    // /**
    //  * @return Vente[] Returns an array of Vente objects
    //  */


    public function getTotalVente()
{
return $this->createQueryBuilder('v')
            ->select('SUM(v.prixVente) AS sumPrix, SUM(v.nbreVente) AS sumVente, v.nom')
            ->getQuery()
            ->getResult();
}

// public function getTotalVente()
// {
// return $this->createQueryBuilder('v')
//         ->select('SUM(v.prixVente) AS sumPrix, SUM(v.nbreVente) AS sumVente, v.nom')
//         ->getQuery()
//         ->getResult();
// }


    }


    /*
    public function findOneBySomeField($value): ?Vente
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
