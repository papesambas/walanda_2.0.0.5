<?php

namespace App\Repository;

use App\Entity\Prenoms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Prenoms>
 *
 * @method Prenoms|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prenoms|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prenoms[]    findAll()
 * @method Prenoms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrenomsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prenoms::class);
    }

//    /**
//     * @return Prenoms[] Returns an array of Prenoms objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Prenoms
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
