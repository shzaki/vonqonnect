<?php
/**
 * Created by PhpStorm.
 * User: sh_za
 * Date: 27-Mar-19
 * Time: 3:51 PM
 */

namespace App\Controller\www;


use App\Domain\Connection\ListAllUsersUseCase;
use App\Domain\Connection\ListUserConnectionsUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}