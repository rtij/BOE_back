<?php

namespace App\Repository;

use App\Entity\Typed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typed|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typed|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typed[]    findAll()
 * @method Typed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typed::class);
    }

    // /**
    //  * @return Typed[] Returns an array of Typed objects
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
    public function findOneBySomeField($value): ?Typed
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
