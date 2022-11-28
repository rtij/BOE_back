<?php

namespace App\Repository;

use App\Entity\Photoof;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Photoof|null find($id, $lockMode = null, $lockVersion = null)
 * @method Photoof|null findOneBy(array $criteria, array $orderBy = null)
 * @method Photoof[]    findAll()
 * @method Photoof[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoofRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Photoof::class);
    }

    // /**
    //  * @return Photoof[] Returns an array of Photoof objects
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
    public function findOneBySomeField($value): ?Photoof
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
