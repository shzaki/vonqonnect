<?php

namespace App\Domain\Connection;

use GuzzleHttp\Client;
use Symfony\Component\Security\Core\Security;

class AddConnectionUseCase
{
	private $security;
	private $client;
	private $endPoint = '/api/connections/addConnection';

	public function __construct(Client $client, Security $security)
	{
		$this->client = $client;
		$this->security = $security;
	}

	public function handle(int $connectionId)
	{
		$apiToken = $this->security->getToken()->getUser()->getApiToken();

		$response = $this->client->post($this->endPoint, [
			'headers' => ['X-AUTH-TOKEN' => $apiToken],
			'body' => [
				'user_id' => $this->security->getToken()->getUser()->getId(),
				'connection_id' => $connectionId,
			],
		]);

		return $response->getBody()->getContents();
	}
}