<?php

namespace App\Repository;

use App\Entity\EcoleProvenances;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EcoleProvenances>
 *
 * @method EcoleProvenances|null find($id, $lockMode = null, $lockVersion = null)
 * @method EcoleProvenances|null findOneBy(array $criteria, array $orderBy = null)
 * @method EcoleProvenances[]    findAll()
 * @method EcoleProvenances[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EcoleProvenancesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EcoleProvenances::class);
    }

//    /**
//     * @return EcoleProvenances[] Returns an array of EcoleProvenances objects
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

//    public function findOneBySomeField($value): ?EcoleProvenances
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
