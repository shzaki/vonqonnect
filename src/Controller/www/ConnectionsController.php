<?php

namespace App\Controller\www;

use App\Domain\Connection\AddConnectionToUserUseCase;
use App\Domain\Connection\ListAllUsersUseCase;
use App\Domain\Connection\ListUserConnectionsUseCase;
use App\Domain\Connection\RemoveConnectionFromUserUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConnectionsController extends AbstractController
{
	/**
	 * @Route("/connection/list-all-users", name="connection.list_all_users")
	 */
	public function listAllUsers(ListAllUsersUseCase $useCase): Response
	{
		return $this->render('connection/list-all-users.html.twig', [
			'users' => json_decode($useCase->handle()),
		]);
	}

	/**
	 * @Route("/connection/list-user-connections", name="connection.list_user_connections")
	 */
	public function listUserConnections(ListUserConnectionsUseCase $useCase): Response
	{
		return $this->render('connection/list-user-connections.html.twig', [
			'users' => json_decode($useCase->handle()),
		]);
	}

	/**
	 * @Route("/connection/add-connection-to-user/{connectionId}", name="connection.add_connection_to_user")
	 */
	public function addConnectionToUser(AddConnectionToUserUseCase $useCase, int $connectionId): JsonResponse
	{
		// TODO: inject AddUserEmailUseCase that will send an email to the new connection to accept or decline the connection
		return new JsonResponse($useCase->handle($connectionId));
	}

	/**
	 * @Route("/connection/remove-connection-from-user/{connectionId}", name="connection.remove_connection_from_user")
	 */
	public function removeConnectionFromUser(RemoveConnectionFromUserUseCase $useCase, int $connectionId): JsonResponse
	{
		return new JsonResponse($useCase->handle($connectionId));
	}
}