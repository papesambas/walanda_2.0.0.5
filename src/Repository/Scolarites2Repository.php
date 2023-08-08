<?php

namespace App\Repository;

use App\Entity\Scolarites2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Scolarites2>
 *
 * @method Scolarites2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scolarites2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scolarites2[]    findAll()
 * @method Scolarites2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Scolarites2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scolarites2::class);
    }

//    /**
//     * @return Scolarites2[] Returns an array of Scolarites2 objects
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

//    public function findOneBySomeField($value): ?Scolarites2
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
