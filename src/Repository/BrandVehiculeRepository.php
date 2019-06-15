<?php

namespace App\Repository;

use App\Entity\BrandVehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BrandVehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method BrandVehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method BrandVehicule[]    findAll()
 * @method BrandVehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BrandVehiculeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BrandVehicule::class);
    }

    // /**
    //  * @return BrandVehicule[] Returns an array of BrandVehicule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BrandVehicule
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
