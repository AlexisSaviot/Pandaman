<?php

namespace App\Repository;

use App\Entity\Editors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Editors|null find($id, $lockMode = null, $lockVersion = null)
 * @method Editors|null findOneBy(array $criteria, array $orderBy = null)
 * @method Editors[]    findAll()
 * @method Editors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EditorsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Editors::class);
    }

    // /**
    //  * @return Editors[] Returns an array of Editors objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Editors
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
