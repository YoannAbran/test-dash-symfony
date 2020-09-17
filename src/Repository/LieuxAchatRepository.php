<?php

namespace App\Repository;

use App\Entity\LieuxAchat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LieuxAchat|null find($id, $lockMode = null, $lockVersion = null)
 * @method LieuxAchat|null findOneBy(array $criteria, array $orderBy = null)
 * @method LieuxAchat[]    findAll()
 * @method LieuxAchat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LieuxAchatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LieuxAchat::class);
    }

    // /**
    //  * @return LieuxAchat[] Returns an array of LieuxAchat objects
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
    public function findOneBySomeField($value): ?LieuxAchat
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
