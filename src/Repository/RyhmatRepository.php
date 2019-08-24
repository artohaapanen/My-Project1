<?php

namespace App\Repository;

use App\Entity\Ryhmat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ryhmat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ryhmat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ryhmat[]    findAll()
 * @method Ryhmat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RyhmatRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ryhmat::class);
    }

    // /**
    //  * @return Ryhmat[] Returns an array of Ryhmat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ryhmat
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
