<?php

namespace App\Repository;

use App\Entity\Enseignements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Enseignements>
 *
 * @method Enseignements|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enseignements|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enseignements[]    findAll()
 * @method Enseignements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnseignementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Enseignements::class);
    }

//    /**
//     * @return Enseignements[] Returns an array of Enseignements objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Enseignements
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
