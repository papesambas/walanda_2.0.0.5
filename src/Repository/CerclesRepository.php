<?php

namespace App\Repository;

use App\Entity\Cercles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cercles>
 *
 * @method Cercles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cercles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cercles[]    findAll()
 * @method Cercles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CerclesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cercles::class);
    }

//    /**
//     * @return Cercles[] Returns an array of Cercles objects
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

//    public function findOneBySomeField($value): ?Cercles
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
