<?php

namespace App\Repository;

use App\Entity\Realitevirtuelle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Realitevirtuelle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Realitevirtuelle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Realitevirtuelle[]    findAll()
 * @method Realitevirtuelle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RealitevirtuelleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Realitevirtuelle::class);
    }

    // /**
    //  * @return Realitevirtuelle[] Returns an array of Realitevirtuelle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Realitevirtuelle
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
