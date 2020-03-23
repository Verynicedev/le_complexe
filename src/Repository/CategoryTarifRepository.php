<?php

namespace App\Repository;

use App\Entity\CategoryTarif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CategoryTarif|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryTarif|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryTarif[]    findAll()
 * @method CategoryTarif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryTarifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryTarif::class);
    }

    // /**
    //  * @return CategoryTarif[] Returns an array of CategoryTarif objects
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
    public function findOneBySomeField($value): ?CategoryTarif
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
