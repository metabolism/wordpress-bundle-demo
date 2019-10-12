<?php

namespace App\Controller;

use App\Service\Context;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
	public function frontAction(Context $context)
	{
	    $context->addPagination();
		return $this->render('index.html.twig', $context->toArray());
	}

	public function pageAction(Context $context)
	{
		$post = $context->getPost();

		if( !$post ){

			$response =  $this->render('404.html.twig', $context->toArray());
			$response->setStatusCode(404);

			return $response;
		}

		return $this->render('page.html.twig', $context->toArray());
	}

	public function guideAction(Context $context)
	{
	    $post = $context->getPost();

        if( !$post ){

            $response =  $this->render('404.html.twig', $context->toArray());
            $response->setStatusCode(404);

            return $response;
        }

		return $this->render('page.html.twig', $context->toArray());
	}

	public function searchAction(Context $context)
	{
        $context->addPagination();
        return $this->render('search.html.twig', $context->toArray());
	}

	public function guideArchiveAction(Context $context)
	{
        $context->addPagination();
        return $this->render('archive.html.twig', $context->toArray());
	}

	public function categoryAction(Context $context)
	{
        $context->addPagination();
        return $this->render('archive.html.twig', $context->toArray());
	}
}