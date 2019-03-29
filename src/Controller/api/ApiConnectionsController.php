<?php
/**
 * Created by PhpStorm.
 * User: sh_za
 * Date: 27-Mar-19
 * Time: 9:37 AM
 */

namespace App\Controller\api;

use App\ApiDomain\Connection\ListAllUsersApiUseCase;
use App\ApiDomain\Connection\ListUserConnectionsApiUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApiConnectionsController extends AbstractController
{
	/**
	 * @Route("/api/connections/listAllUsers", name="api.v1.connections.listAllUsers")
	 */
	public function listAllUsers(ListAllUsersApiUseCase $useCase): JsonResponse
	{
		return $this->json($useCase->handle(), 200, [], [
			'groups' => ['main'],
		]);
	}

	/**
	 * @Route("/api/connections/listUserConnections", name="api.v1.connections.listUserConnections")
	 */
	public function listUserConnections(ListUserConnectionsApiUseCase $useCase, Request $request): JsonResponse
	{
		return $this->json($useCase->handle($request->get('user_id')), 200, [], [
			'groups' => ['main'],
		]);
	}
}