<?php

namespace App\Repository;

use App\Entity\Peres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Peres>
 *
 * @method Peres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Peres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Peres[]    findAll()
 * @method Peres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Peres::class);
    }

    public function findOneByTelephoneld($telephone): ?Peres
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.telephone = :telephone')
            ->setParameter('telephone', $telephone)
            ->getQuery()
            ->getOneOrNullResult();
    }


    //    /**
    //     * @return Peres[] Returns an array of Peres objects
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

    //    public function findOneBySomeField($value): ?Peres
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
