<?php

namespace App\Repository;

use App\Entity\Conducteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Conducteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conducteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conducteur[]    findAll()
 * @method Conducteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConducteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conducteur::class);
    }
    public function findByFirstNameAndLastName(string $value){
        //'d' correspond à la classe 'rental'
        return $this->createQueryBuilder('c')
            ->orWhere('c.firstname LIKE :val')
            ->orWhere('c.lastname LIKE :val')
            ->setParameter('val','%'.$value.'%')
            ->orderBy('d.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Conducteur[] Returns an array of Conducteur objects
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
    public function findOneBySomeField($value): ?Conducteur
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
