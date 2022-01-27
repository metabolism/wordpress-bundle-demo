<?php

namespace App\Controller;

use Metabolism\WordpressBundle\Entity\Post;
use Metabolism\WordpressBundle\Entity\Term;

use Metabolism\WordpressBundle\Entity\User;
use Metabolism\WordpressBundle\Service\PaginationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
	public function staticAction()
	{
		return $this->render('static.html.twig', []);
	}
}