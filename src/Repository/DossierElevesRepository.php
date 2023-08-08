<?php

namespace App\Repository;

use App\Entity\DossierEleves;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DossierEleves>
 *
 * @method DossierEleves|null find($id, $lockMode = null, $lockVersion = null)
 * @method DossierEleves|null findOneBy(array $criteria, array $orderBy = null)
 * @method DossierEleves[]    findAll()
 * @method DossierEleves[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DossierElevesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DossierEleves::class);
    }

//    /**
//     * @return DossierEleves[] Returns an array of DossierEleves objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DossierEleves
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
