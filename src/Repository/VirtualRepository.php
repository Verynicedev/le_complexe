<?php

namespace App\Repository;

use App\Entity\Virtual;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Virtual|null find($id, $lockMode = null, $lockVersion = null)
 * @method Virtual|null findOneBy(array $criteria, array $orderBy = null)
 * @method Virtual[]    findAll()
 * @method Virtual[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VirtualRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Virtual::class);
    }

    // /**
    //  * @return Virtual[] Returns an array of Virtual objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Virtual
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
