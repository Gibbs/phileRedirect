<?php
/**
 * Redirect Phile requests
 *
 * @package gibbs\redirect
 * @author  Dan Gibbs <i@dangibbs.co.uk>
 */
namespace Phile\Plugin\Gibbs\Redirects;

class Plugin extends \Phile\Plugin\AbstractPlugin implements
    \Phile\Gateway\EventObserverInterface
{
    /**
     * HTTP status codes
     *
     * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
     */
    protected $response = array(
        300 => 'HTTP/1.1 300 Multiple Choices',
        301 => 'HTTP/1.1 301 Moved Permanently',
        307 => 'HTTP/1.1 307 Temporary Redirect',
    );

    /**
     * Register plugin events via the constructor
     *
     * @return void
     */
    public function __construct()
    {
        \Phile\Event::registerEvent('request_uri', $this);
    }

    /**
     * Listen to event triggers
     *
     * @param  string  $eventKey  Triggered event key
     * @param  array   $data      Array of event data
     * @return void
     */
    public function on($eventKey, $data = null)
    {
        if($eventKey == 'request_uri')
        {
            if($match = $this->findUri($data['uri'], $this->settings))
            {
                header($this->response[$match['response']]);
                header('Location: ' . $match['location']);
            }
        }
    }

    /**
     * Find request URI in config array
     *
     * @param  string  $uri        The request URI
     * @param  array   $redirects  Config array of uris to match
     * @return array|void
     */
    protected function findUri($uri = null, $redirects = array())
    {
        if($uri === null OR empty($redirects))
            return;

        // Remove trailing slash
        $uri = rtrim($uri, '/');

        foreach($redirects as $response => $urls)
        {
            if(!is_array($urls)) continue;

            if(array_key_exists($uri, $urls) ) {
                return array(
                    'response' => $response,
                    'location' => $urls[$uri],
                );
            }
        }
    }
}
