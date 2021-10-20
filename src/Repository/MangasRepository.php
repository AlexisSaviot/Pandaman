<?php

namespace App\Repository;

use App\Entity\Mangas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mangas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mangas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mangas[]    findAll()
 * @method Mangas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MangasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mangas::class);
    }

    // /**
    //  * @return Mangas[] Returns an array of Mangas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mangas
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
