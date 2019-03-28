<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class HomeController extends AbstractController
{
	private $urlGenerator;

	public function __construct(UrlGeneratorInterface $urlGenerator)
	{
		$this->urlGenerator = $urlGenerator;
	}
    /**
     * @Route("/", name="home")
     */
    public function home(): RedirectResponse
    {
		$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
		return new RedirectResponse($this->urlGenerator->generate('connection.list_all_users'));
    }
}
