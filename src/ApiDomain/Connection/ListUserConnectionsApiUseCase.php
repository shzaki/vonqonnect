<?php

namespace App\ApiDomain\Connection;

use App\Entity\User;
use Doctrine\Common\Persistence\ManagerRegistry;

class ListUserConnectionsApiUseCase
{
	private $doctrine;

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