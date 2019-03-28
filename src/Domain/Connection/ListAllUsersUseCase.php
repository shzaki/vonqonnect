<?php
/**
 * Created by PhpStorm.
 * User: sh_za
 * Date: 27-Mar-19
 * Time: 4:16 PM
 */

namespace App\Domain\Connection;


use GuzzleHttp\Client;
use Symfony\Component\Security\Core\Security;

class ListAllUsersUseCase
{
	private $security;
	private $client;
	private $endPoint = '/api/v1/connections/listAllUsers';

	public function __construct(Client $client, Security $security)
	{
		$this->client = $client;
		$this->security = $security;
	}

	public function handle()
	{
		$apiToken = $this->security->getToken()->getUser()->getApiToken();

		$response = $this->client->get($this->endPoint, ['headers' => ['X-AUTH-TOKEN' => $apiToken]]);

		return $response->getBody()->getContents();
	}
}