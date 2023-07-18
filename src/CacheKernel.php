<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheKernel extends HttpCache
{
	/**
	 * @param Request $request
	 * @param bool $catch
	 * @return Response
	 * @throws \Exception
	 */
	protected function invalidate(Request $request, $catch = false)
	{
		if ('PURGE' !== $request->getMethod())
			return parent::invalidate($request, $catch);

		if ( strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']) === false) {
			return new Response(
				'Invalid HTTP method',
				Response::HTTP_BAD_REQUEST
			);
		}

		$response = new Response();

		if( substr($request->getUri(), -1) == '*' )
		{
			$cache_dir = $this->kernel->getCacheDir();
			$filesystem = new Filesystem();

			try{
				$filesystem->remove($cache_dir);
				$response->setStatusCode(Response::HTTP_OK, 'Purged');
			}
			catch(IOException $e){
				$response->setStatusCode($e->getCode(), $e->getMessage());
			}
		}
		else
		{
			if ($this->getStore()->purge($request->getUri()))
				$response->setStatusCode(Response::HTTP_OK, 'Purged');
			else
				$response->setStatusCode(Response::HTTP_NOT_FOUND, 'Not found');
		}

		return $response;
	}

	/**
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			'default_ttl' => 3600
		);
	}
}
