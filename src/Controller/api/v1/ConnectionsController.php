<?php
/**
 * Created by PhpStorm.
 * User: sh_za
 * Date: 27-Mar-19
 * Time: 9:37 AM
 */

namespace App\Controller\api\v1;

use App\ApiDomain\Connection\ListAllUsersUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ConnectionsController extends AbstractController
{
	/**
	 * @Route("/api/v1/connections/listAllUsers", name="api.v1.connections.listAllUsers")
	 */
	public function listAllUsers(ListAllUsersUseCase $useCase): JsonResponse
	{
		return $this->json($useCase->handle(), 200, [], [
			'groups' => ['main'],
		]);
	}
}