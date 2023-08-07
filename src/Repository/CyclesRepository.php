<?php

namespace App\Repository;

use App\Entity\Cycles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cycles>
 *
 * @method Cycles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cycles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cycles[]    findAll()
 * @method Cycles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CyclesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cycles::class);
    }

//    /**
//     * @return Cycles[] Returns an array of Cycles objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cycles
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
