<?php

namespace App\Repository;

use App\Entity\TestReservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TestReservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestReservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestReservation[]    findAll()
 * @method TestReservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestReservation::class);
    }

    // /**
    //  * @return TestReservation[] Returns an array of TestReservation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TestReservation
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
