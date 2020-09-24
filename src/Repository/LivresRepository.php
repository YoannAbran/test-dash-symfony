<?php

namespace App\Repository;

use App\Entity\Livres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Livres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livres[]    findAll()
 * @method Livres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livres::class);
    }

    public function getSumCat()
{
return $this->createQueryBuilder('l')
            ->select('SUM(l.prix) AS sumPrix, l.categorie')
            ->groupBy('l.categorie')
            ->getQuery()
            ->getResult();
}
    public function getSumCatYear()
{
return $this->createQueryBuilder('l')
            ->select('SUM(l.prix) AS prixCat, l.categorie')
            ->groupBy('l.categorie')
            ->where('l.dateAchat BETWEEN :debut AND :fin')
            ->setParameter('debut', new \Datetime(date('Y').'-01-01'))
            ->setParameter('fin', new \Datetime(date('Y').'-12-31'))
            ->getQuery()
            ->getResult();
}
    public function getSumCatTotalYear()
{
return $this->createQueryBuilder('l')
            ->select('SUM(l.prix) AS sumTotalPrix')
            ->where('l.dateAchat BETWEEN :debut AND :fin')
            ->setParameter('debut', new \Datetime(date('Y').'-01-01'))
            ->setParameter('fin', new \Datetime(date('Y').'-12-31'))
            ->getQuery()
            ->getResult();
}

    public function getStock()
{
return $this->createQueryBuilder('l')
            ->select('Count(l.nom) AS nomS, AVG(l.prix) AS prixMoy, l.nom')
            ->groupBy('l.nom')
            ->getQuery()
            ->getResult();
}




    // /**
    //  * @return Livres[] Returns an array of Livres objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Livres
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
