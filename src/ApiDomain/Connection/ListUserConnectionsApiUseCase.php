<?php
/**
 * Created by PhpStorm.
 * User: sh_za
 * Date: 27-Mar-19
 * Time: 9:49 AM
 */

namespace App\ApiDomain\Connection;


use App\Entity\User;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Security;

class ListUserConnectionsApiUseCase
{
	private $doctrine;
	private $userId;

	public function __construct(ManagerRegistry $doctrine)
	{
		$this->doctrine = $doctrine;
	}

	public function handle(int $userId): array
	{
		$users = $this->doctrine->getRepository(User::class);

		return $users->findUserWithConnections($userId);
	}
}