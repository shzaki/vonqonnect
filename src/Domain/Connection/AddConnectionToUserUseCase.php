<?php

namespace App\Domain\Connection;

use GuzzleHttp\Client;
use Symfony\Component\Security\Core\Security;

class AddConnectionToUserUseCase
{
	private $security;
	private $client;
	private $endPoint = '/api/connection/add-connection-to-user';

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
			'form_params' => [
				'user_id' => $this->security->getToken()->getUser()->getId(),
				'connection_id' => $connectionId,
			],
		]);

		return $response->getBody()->getContents();
	}
}