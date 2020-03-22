<?php

namespace App\Repository;

use App\Entity\TagVirtual;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TagVirtual|null find($id, $lockMode = null, $lockVersion = null)
 * @method TagVirtual|null findOneBy(array $criteria, array $orderBy = null)
 * @method TagVirtual[]    findAll()
 * @method TagVirtual[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagVirtualRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TagVirtual::class);
    }

    // /**
    //  * @return TagVirtual[] Returns an array of TagVirtual objects
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
    public function findOneBySomeField($value): ?TagVirtual
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
