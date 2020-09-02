<?php

namespace App\Repository;

use App\Entity\Groupe;
use App\Entity\Subscriber;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Subscriber|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subscriber|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subscriber[]    findAll()
 * @method Subscriber[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubscriberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subscriber::class);
    }

    public function findByBandFollowed(Groupe $band)
    {
        return $this->createQueryBuilder('sub')
            ->leftJoin('sub.bands', 'bands')
            ->andWhere('bands.id = :bandID') 
            ->setParameter('bandID', $band->getId())
            ->getQuery()
            ->getResult()
        ;
    }

}
