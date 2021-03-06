<?php

namespace App\Domain\Connection;

use GuzzleHttp\Client;
use Symfony\Component\Security\Core\Security;

class ListAllUsersUseCase
{
	private $security;
	private $client;
	private $endPoint = '/api/connection/list-all-users';

	public function __construct(Client $client, Security $security)
	{
		$this->client = $client;
		$this->security = $security;
	}

	public function handle()
	{
		$apiToken = $this->security->getToken()->getUser()->getApiToken();

		$response = $this->client->get($this->endPoint . '?user_id=' . $this->security->getToken()->getUser()->getId(), [
			'headers' => ['X-AUTH-TOKEN' => $apiToken],
		]);

		return $response->getBody()->getContents();
	}
}