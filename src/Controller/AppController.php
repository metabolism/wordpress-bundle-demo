<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
	public function staticAction()
	{
		return $this->render('static.html.twig', []);
	}
}
