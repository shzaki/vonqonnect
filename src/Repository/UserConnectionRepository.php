<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\UserConnection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserConnection|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserConnection|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserConnection[]    findAll()
 * @method UserConnection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserConnectionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserConnection::class);
    }

	/**
	 * @param int $userId
	 * @param int $connectionId
	 * @throws \Doctrine\ORM\ORMException
	 * @throws \Doctrine\ORM\OptimisticLockException
	 */
    public function addConnection(int $userId, int $connectionId)
	{
		$entityManager = $this->getEntityManager();

		$connection = $entityManager
			->getRepository(User::class)
			->find($connectionId);

		$userConnection = new UserConnection();
		$userConnection->setUserId($userId);
		$userConnection->setConnection($connection);
		$userConnection->setStatus(UserConnection::PENDING);

		$entityManager->persist($userConnection);

		$entityManager->flush();
	}

    // /**
    //  * @return UserConnection[] Returns an array of UserConnection objects
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
    public function findOneBySomeField($value): ?UserConnection
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
