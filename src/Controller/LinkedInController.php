<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LinkedInController extends AbstractController
{
	/**
	 * Link to this controller to start the "connect" process
	 *
	 * @Route("/connect/linkedin", name="connect_linkedin_start")
	 */
	public function connectAction(ClientRegistry $clientRegistry)
	{
		// on Symfony 3.3 or lower, $clientRegistry = $this->get('knpu.oauth2.registry');

		// will redirect to linkedin!
		return $clientRegistry
			->getClient('linkedin') // key used in config/packages/knpu_oauth2_client.yaml
			->redirect([
				'public_profile', 'email' // the scopes you want to access
			])
			;
	}

	/**
	 * After going to linkedin, you're redirected back here
	 * because this is the "redirect_route" you configured
	 * in config/packages/knpu_oauth2_client.yaml
	 *
	 * @Route("/connect/linkedin/check", name="connect_linkedin_check")
	 */
	public function connectCheckAction(Request $request, ClientRegistry $clientRegistry)
	{
		return $this->redirectToRoute('home');
	}
}
