<?php

namespace App\Repository;

use App\Entity\Soggetto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Soggetto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Soggetto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Soggetto[]    findAll()
 * @method Soggetto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SoggettoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Soggetto::class);
    }

    // /**
    //  * @return Soggetto[] Returns an array of Soggetto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Soggetto
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
