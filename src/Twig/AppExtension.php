<?php

/**
 * Class AppExtension
 *
 * Provide a set of methods which can be used in template engine
 *
 */

namespace App\Twig;

use App\Repository\EventsRepository;
use Metabolism\WordpressBundle\Entity\Blog;
use Metabolism\WordpressBundle\Entity\Term;
use Metabolism\WordpressBundle\Repository\PostRepository;
use Twig\Extension\AbstractExtension,
	Twig\TwigFilter,
	Twig\TwigFunction;
use function Env\env;

class AppExtension extends AbstractExtension{

    private $translations;
    private static $missing_translations;

    /**
     * AppExtension constructor.
     */
    public function __construct()
    {
        if( is_admin() )
            $this->getTranslations();

        add_action('kernel_loaded', [$this, 'getTranslations']);
    }


	/**
	 * @return array|TwigFilter[]
	 */
	public function getFilters()
	{
		return [
            new TwigFilter( 't', [$this,'translate'] ),
        ];
	}

	/**
	 * @return array|TwigFunction[]
	 */
	public function getFunctions()
	{
		return [
            new TwigFunction( 'enqueue_contact_form_scripts', 'enqueue_contact_form_scripts' )
		];
	}


    /**
     * @param $text
     * @param array $params
     * @return string
     */
    public function translate($text, $params=[])
    {
        $key = sanitize_title($text);
        $params = (array)$params;

        if( isset($this->translations[$key]) ){

            return vsprintf($this->translations[$key], $params);
        }
        else{

            if( $_GET['debug']??'' == 'translation' && $_ENV['APP_ENV'] == 'dev' )
                return '¿@ '.htmlspecialchars($text).' @?';

            return vsprintf($text, $params);
        }
    }


    /**
     *
     */
    public function getTranslations()
    {
        $blog = Blog::getInstance();

        if( $translations = $blog->getCustomField('translations') )
        {
            $this->translations = [];
            foreach ($translations as $translation)
            {
                $key = sanitize_title($translation['key']);
                $this->translations[$key] = $translation['translation'];
            }
        }
    }
}
