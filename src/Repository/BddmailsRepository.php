<?php

namespace App\Repository;

use App\Entity\Bddmails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bddmails|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bddmails|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bddmails[]    findAll()
 * @method Bddmails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BddmailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bddmails::class);
    }

    // /**
    //  * @return Bddmails[] Returns an array of Bddmails objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bddmails
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
