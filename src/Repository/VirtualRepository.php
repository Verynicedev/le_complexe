<?php

namespace App\Repository;

use App\Entity\Virtual;
use App\Entity\CategoryVirtual;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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

    public function findAllWithJoin(){
        $qb= $this->createQueryBuilder('v');
        $qb ->orderBy('v.id','DESC')
            ->join('v.category','c')
            ->addSelect('c')
            ->leftJoin('v.tag','t')
            ->addSelect('t')
            ;
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function findAllWithJoinByCategory(CategoryVirtual $category){
        $qb= $this->createQueryBuilder('v');
        $qb ->orderBy('v.nom','DESC')
            ->join('v.category','c')
            ->addSelect('c')
            ->leftJoin('v.tag','t')
            ->addSelect('t')
            ->andWhere('c = ?1')
            ->SetParameter(1, $category)
            ;
        $query = $qb->getQuery();
        return $query->getResult();
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
