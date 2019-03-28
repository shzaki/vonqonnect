<?php
/**
 * Created by PhpStorm.
 * User: sh_za
 * Date: 27-Mar-19
 * Time: 3:51 PM
 */

namespace App\Controller\Connection;


use App\Domain\Connection\ListAllUsersUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListAllUsersController extends AbstractController
{
	/**
	 * @Route("/connection/list-all-users", name="connection.list_all_users")
	 */
	public function __invoke(ListAllUsersUseCase $useCase): Response
	{
		return $this->render('connection/list-all-users.html.twig', [
			'users' => json_decode($useCase->handle()),
		]);
	}
}