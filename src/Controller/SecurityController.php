<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
	private $urlGenerator;

	public function __construct(UrlGeneratorInterface $urlGenerator, Security $security)
	{
		$this->security = $security;
		$this->urlGenerator = $urlGenerator;
	}
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

		if ($this->security->getUser()) {
			return $this->redirectToRoute('home');
		}

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

	/**
	 * @Route("/logout", name="app_logout", methods={"GET"})
	 */
	public function logout(): Response
	{
		// TODO: change route
		return new RedirectResponse($this->urlGenerator->generate('app_login'));
	}
}
