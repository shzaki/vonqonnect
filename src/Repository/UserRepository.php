<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

	public function findUserWithConnections($userId)
	{
		return $this->createQueryBuilder('user')
			->innerJoin('user.userConnections', 'UserConnection')
			->addSelect('UserConnection')
			->andWhere('UserConnection.userId = :userId')
			->setParameter('userId', $userId)
			->getQuery()
			->getArrayResult();
	}

	public function findAllWithConnections($userId)
	{

		return $this->createQueryBuilder('user')
			->leftJoin('user.userConnections', 'UserConnection')
			->addSelect('UserConnection')
			->andWhere('user.id != :userId')
			->setParameter('userId', $userId)
			->getQuery()
			->getArrayResult();
	}
    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
