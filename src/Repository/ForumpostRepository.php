<?php

namespace App\Repository;

use App\Entity\Forumpost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Forumpost>
 *
 * @method Forumpost|null find($id, $lockMode = null, $lockVersion = null)
 * @method Forumpost|null findOneBy(array $criteria, array $orderBy = null)
 * @method Forumpost[]    findAll()
 * @method Forumpost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForumpostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Forumpost::class);
    }

//    /**
//     * @return Forumpost[] Returns an array of Forumpost objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Forumpost
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
