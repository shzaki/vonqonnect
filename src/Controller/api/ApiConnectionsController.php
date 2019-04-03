<?php

namespace App\Controller\api;

use App\ApiDomain\Connection\AddConnectionToUserApiUseCase;
use App\ApiDomain\Connection\ListAllUsersApiUseCase;
use App\ApiDomain\Connection\ListUserConnectionsApiUseCase;
use App\ApiDomain\Connection\RemoveConnectionFromUserApiUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApiConnectionsController extends AbstractController
{
	/**
	 * @Route("/api/connection/list-all-users", name="api.connection.list_all_users")
	 */
	public function listAllUsers(ListAllUsersApiUseCase $useCase, Request $request): JsonResponse
	{
		return $this->json($useCase->handle($request->get('user_id')), 200, [], [
			'groups' => ['main'],
		]);
	}

	/**
	 * @Route("/api/connection/list-user-connections", name="api.connection.list_user_connections")
	 */
	public function listUserConnections(ListUserConnectionsApiUseCase $useCase, Request $request): JsonResponse
	{
		return $this->json($useCase->handle($request->get('user_id')), 200, [], [
			'groups' => ['main'],
		]);
	}

	/**
	 * @Route("/api/connection/add-connection-to-user", name="api.connection.add_connection_to_user" , methods={"POST"})
	 */
	public function addConnection(AddConnectionToUserApiUseCase $useCase, Request $request): JsonResponse
	{
		return $this->json($useCase->handle($request->get('user_id'), $request->get('connection_id')), 200, [], [
			'groups' => ['main'],
		]);
	}

	/**
	 * @Route("/api/connection/remove-connection-from-user", name="api.connection.remove_connection_from_user" , methods={"POST"})
	 */
	public function removeConnection(RemoveConnectionFromUserApiUseCase $useCase, Request $request): JsonResponse
	{
		return $this->json($useCase->handle($request->get('user_id'), $request->get('connection_id')), 200, [], [
			'groups' => ['main'],
		]);
	}
}