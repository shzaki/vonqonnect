<?php
/**
 * Created by PhpStorm.
 * User: sh_za
 * Date: 27-Mar-19
 * Time: 4:16 PM
 */

namespace App\Domain\Connection;


use GuzzleHttp\Client;
use Symfony\Component\Security\Core\User\UserInterface;

class ListAllUsersUseCase
{
	private $client;
	private $endPoint = '/api/v1/connections/listAllUsers';

	public function __construct(Client $client)
	{
		$this->client = $client;
		$this->user = $user;
	}

	public function handle()
	{
		dd($this->client->get($this->endPoint));
		return [1,2,3];

	}
}