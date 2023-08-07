<?php

namespace App\Repository;

use App\Entity\Professions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Professions>
 *
 * @method Professions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Professions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Professions[]    findAll()
 * @method Professions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfessionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Professions::class);
    }

//    /**
//     * @return Professions[] Returns an array of Professions objects
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

//    public function findOneBySomeField($value): ?Professions
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
