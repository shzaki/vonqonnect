<?php

namespace App\Controller\api;

use App\ApiDomain\Connection\AddConnectionApiUseCase;
use App\ApiDomain\Connection\ListAllUsersApiUseCase;
use App\ApiDomain\Connection\ListUserConnectionsApiUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApiConnectionsController extends AbstractController
{
	/**
	 * @Route("/api/connections/listAllUsers", name="api.connections.listAllUsers")
	 */
	public function listAllUsers(ListAllUsersApiUseCase $useCase, Request $request): JsonResponse
	{
		return $this->json($useCase->handle($request->get('user_id')), 200, [], [
			'groups' => ['main'],
		]);
	}

	/**
	 * @Route("/api/connections/listUserConnections", name="api.connections.listUserConnections")
	 */
	public function listUserConnections(ListUserConnectionsApiUseCase $useCase, Request $request): JsonResponse
	{
		return $this->json($useCase->handle($request->get('user_id')), 200, [], [
			'groups' => ['main'],
		]);
	}

	/**
	 * @Route("/api/connections/addConnection", name="api.connections.addConnection" , methods={"POST"})
	 */
	public function addConnection(AddConnectionApiUseCase $useCase, Request $request): JsonResponse
	{
		return $this->json($useCase->handle($request->get('user_id'), $request->get('connection_id')), 200, [], [
			'groups' => ['main'],
		]);
	}
}