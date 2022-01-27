<?php

namespace App\Controller;

use Metabolism\WordpressBundle\Controller\FrontController as WordpressFrontController;

class FrontController extends WordpressFrontController
{
	/**
	 * Execute code when the front is loaded
	 * Equivalent to if( !is_admin() ) add_action('init', function(){ })
	 *
	 * If you want to execute code for both admin and front, create a WordpressController
	 * please take a loot a samples/controller/WordpressController.php in /vendor/metabolism/wordpress-bundle
	 */
	public function init()
	{
        add_filter( 'post_class', function( $classes, $class, $post_id ) {

            $classes[] = 'entry';
            return $classes;

        }, 10, 3 );
	}
}
