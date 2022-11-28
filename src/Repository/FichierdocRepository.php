<?php

namespace App\Repository;

use App\Entity\Fichierdoc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fichierdoc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fichierdoc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fichierdoc[]    findAll()
 * @method Fichierdoc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FichierdocdocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fichierdoc::class);
    }

    // /**
    //  * @return Fichierdoc[] Returns an array of Fichierdoc objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fichierdoc
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
