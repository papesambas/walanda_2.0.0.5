<?php

namespace App\Repository;

use App\Entity\Meres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Meres>
 *
 * @method Meres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Meres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Meres[]    findAll()
 * @method Meres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Meres::class);
    }

//    /**
//     * @return Meres[] Returns an array of Meres objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Meres
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
