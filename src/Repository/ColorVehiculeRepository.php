<?php

namespace App\Repository;

use App\Entity\ColorVehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ColorVehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method ColorVehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method ColorVehicule[]    findAll()
 * @method ColorVehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColorVehiculeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ColorVehicule::class);
    }

    // /**
    //  * @return ColorVehicule[] Returns an array of ColorVehicule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ColorVehicule
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
