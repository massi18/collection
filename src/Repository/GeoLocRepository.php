<?php

namespace App\Repository;

use App\Entity\GeoLoc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GeoLoc|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeoLoc|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeoLoc[]    findAll()
 * @method GeoLoc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeoLocRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GeoLoc::class);
    }

//    /**
//     * @return GeoLoc[] Returns an array of GeoLoc objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GeoLoc
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
