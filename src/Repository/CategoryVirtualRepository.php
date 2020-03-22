<?php

namespace App\Repository;

use App\Entity\CategoryVirtual;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CategoryVirtual|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryVirtual|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryVirtual[]    findAll()
 * @method CategoryVirtual[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryVirtualRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryVirtual::class);
    }

    // /**
    //  * @return CategoryVirtual[] Returns an array of CategoryVirtual objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoryVirtual
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
