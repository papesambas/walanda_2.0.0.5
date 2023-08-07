<?php

namespace App\Repository;

use App\Entity\Ninas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ninas>
 *
 * @method Ninas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ninas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ninas[]    findAll()
 * @method Ninas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NinasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ninas::class);
    }

//    /**
//     * @return Ninas[] Returns an array of Ninas objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ninas
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
