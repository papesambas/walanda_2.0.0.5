<?php

namespace App\Repository;

use App\Entity\Scolarites1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Scolarites1>
 *
 * @method Scolarites1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scolarites1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scolarites1[]    findAll()
 * @method Scolarites1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Scolarites1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scolarites1::class);
    }

//    /**
//     * @return Scolarites1[] Returns an array of Scolarites1 objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Scolarites1
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
