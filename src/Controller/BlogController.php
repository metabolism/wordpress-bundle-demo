<?php

namespace App\Controller;

use Metabolism\WordpressBundle\Entity\Blog;
use Metabolism\WordpressBundle\Entity\Post;
use Metabolism\WordpressBundle\Entity\PostCollection;
use Metabolism\WordpressBundle\Entity\Term;

use Metabolism\WordpressBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
	public function homeAction(PostCollection $posts, Blog $blog)
	{
		return $this->render('index.html.twig', [
            'posts'=>$posts
        ]);
	}

	public function postAction(Post $post)
	{
		return $this->render('single.html.twig', [
            'post'=>$post
        ]);
	}

	public function pageAction(Post $post)
	{
		return $this->render('single.html.twig', [
            'post'=>$post
        ]);
	}

	public function guideAction(Post $post)
	{
		return $this->render('single.html.twig', ['post'=>$post]);
	}

	public function searchAction(PostCollection $posts, $search)
	{
        return $this->render('search.html.twig', [
            'search_query'=>$search,
            'posts'=>$posts
        ]);
	}

	public function guideArchiveAction(PostCollection $posts)
	{
        return $this->render('archive.html.twig', [
            'posts'=>$posts
        ]);
	}

	public function categoryAction(Term $term, PostCollection $posts)
	{
        return $this->render('archive.html.twig', [
            'posts'=>$posts,
            'term'=>$term
        ]);
	}

	public function authorAction(User $user, PostCollection $posts)
	{
        return $this->render('archive.html.twig', [
            'posts'=>$posts,
            'author'=>$user
        ]);
	}

    public function errorAction(\Throwable $exception)
    {
        $code = $exception->getCode();

        if( $code == 503 )
            $response = $this->render( 'maintenance.html.twig' );
        else if( $code == 404 )
            $response = $this->render( '404.html.twig' );
        else
            $response = $this->render( '500.html.twig', ['exception'=>$exception] );

        $response->setStatusCode($code?:500);

        return $response;
    }
}
