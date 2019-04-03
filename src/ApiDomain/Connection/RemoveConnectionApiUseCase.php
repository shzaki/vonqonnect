<?php

namespace App\ApiDomain\Connection;

use App\Entity\User;
use App\Entity\UserConnection;
use Doctrine\Common\Persistence\ManagerRegistry;

class RemoveConnectionApiUseCase
{
	private $doctrine;

	public function __construct(ManagerRegistry $doctrine)
	{
		$this->doctrine = $doctrine;
	}

	public function handle(int $userId, int $connectionId): bool
	{
		$connections = $this->doctrine->getRepository(UserConnection::class);
		try {
			$connections->removeConnection($userId, $connectionId);
			return true;
		} catch (\Exception $exception) {
			return false;
		}
	}
}