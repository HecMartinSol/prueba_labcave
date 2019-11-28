<?php

namespace App\Repository;

use App\Entity\Homeworld;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Homeworld|null find($id, $lockMode = null, $lockVersion = null)
 * @method Homeworld|null findOneBy(array $criteria, array $orderBy = null)
 * @method Homeworld[]    findAll()
 * @method Homeworld[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HomeworldRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Homeworld::class);
    }

    // /**
    //  * @return Homeworld[] Returns an array of Homeworld objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Homeworld
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
