<?php
/**
 * Created by PhpStorm.
 * User: sh_za
 * Date: 27-Mar-19
 * Time: 9:37 AM
 */

namespace App\Controller\api\v1;

use App\ApiDomain\Connection\ListAllUsersApiUseCase;
use App\ApiDomain\Connection\ListUserConnectionsApiUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConnectionsController extends AbstractController
{
	/**
	 * @Route("/api/v1/connections/listAllUsers", name="api.v1.connections.listAllUsers")
	 */
	public function listAllUsers(ListAllUsersApiUseCase $useCase): JsonResponse
	{
		return $this->json($useCase->handle(), 200, [], [
			'groups' => ['main'],
		]);
	}

	/**
	 * @Route("/api/v1/connections/listUserConnections", name="api.v1.connections.listAllUsers")
	 */
	public function listUserConnections(ListUserConnectionsApiUseCase $useCase, Request $request): JsonResponse
	{
		return $this->json($useCase->handle($request->get('user_id')), 200, [], [
			'groups' => ['main'],
		]);
	}
}