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

class ListAllUsersUseCase
{
	private $doctrine;

	public function __construct(ManagerRegistry $doctrine)
	{
		$this->doctrine = $doctrine;
	}

	public function handle(): array
	{
		$repository = $this->doctrine->getRepository(User::class);

		return $repository->findAll();

	}
}