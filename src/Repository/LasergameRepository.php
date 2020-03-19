<?php

namespace App\Repository;

use App\Entity\Lasergame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Lasergame|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lasergame|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lasergame[]    findAll()
 * @method Lasergame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LasergameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lasergame::class);
    }

    // /**
    //  * @return Lasergame[] Returns an array of Lasergame objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lasergame
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
