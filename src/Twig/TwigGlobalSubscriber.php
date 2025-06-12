<?php

namespace App\Twig;

use Metabolism\WordpressBundle\Repository\PostRepository;
use Metabolism\WordpressBundle\Repository\TermRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class TwigGlobalSubscriber implements EventSubscriberInterface {

	/**
	 * @var Environment
	 */
	private $twig;
	private $termRepository;

	public function __construct( Environment $twig, TermRepository $termRepository) {

		$this->twig = $twig;
		$this->termRepository = $termRepository;
	}

	public function injectGlobalVariables() {

		$locations = $this->termRepository->findBy(['taxonomy'=>'location', 'parent'=>0], null, -1);
		$this->twig->addGlobal('locations', $locations);
	}

	public static function getSubscribedEvents(): array
    {

		return [ KernelEvents::CONTROLLER =>  'injectGlobalVariables' ];
	}

	public function onKernelRequest()
	{
	}
}
