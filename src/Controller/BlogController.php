<?php

namespace App\Controller;

use Metabolism\WordpressBundle\Entity\Post;
use Metabolism\WordpressBundle\Entity\Term;

use Metabolism\WordpressBundle\Entity\User;
use Metabolism\WordpressBundle\Service\PaginationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
	public function homeAction(array $posts, PaginationService $paginationService)
	{
		return $this->render('index.html.twig', [
            'pagination'=>$paginationService->build(),
            'posts'=>$posts
        ]);
	}

	public function maintenanceAction()
	{
		return $this->render('maintenance.html.twig', []);
	}

	public function pageAction(Post $post)
	{
		return $this->render('single.html.twig', ['post'=>$post]);
	}

	public function guideAction(Post $post)
	{
		return $this->render('single.html.twig', ['post'=>$post]);
	}

	public function searchAction(array $posts, PaginationService $paginationService)
	{
        return $this->render('search.html.twig', [
            'pagination'=>$paginationService->build(),
            'posts'=>$posts
        ]);
	}

	public function guideArchiveAction(array $posts, PaginationService $paginationService)
	{
        return $this->render('archive.html.twig', [
            'pagination'=>$paginationService->build(),
            'posts'=>$posts
        ]);
	}

	public function categoryAction(Term $term, array $posts, PaginationService $paginationService)
	{
        return $this->render('archive.html.twig', [
            'pagination'=>$paginationService->build(),
            'posts'=>$posts,
            'term'=>$term
        ]);
	}

	public function authorAction(User $user, array $posts, PaginationService $paginationService)
	{
        return $this->render('archive.html.twig', [
            'pagination'=>$paginationService->build(),
            'posts'=>$posts,
            'author'=>$user
        ]);
	}

    public function errorAction()
    {
        $response = $this->render( '404.html.twig' );
        $response->setStatusCode(404);

        return $response;
    }
}