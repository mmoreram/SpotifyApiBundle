<?php

/**
 * Spotify API Bundle for Symfony2
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @since 2013
 */

namespace Mmoreram\SpotifyApiBundle\Services;

use Buzz\Browser;
use Mmoreram\SpotifyApiBundle\Mapper\SpotifyMapper;

/**
 * Service base
 */
class SpotifyApi
{

    /**
     * @var Buzz\Browser
     *
     * Buzz service instance
     */
    private $buzz;

    /**
     * @var Mmoreram\SpotifyApiBundle\Mapper\SpotifyMapper
     *
     * Mapper instance
     */
    private $mapper;

    /**
     * @var string
     *
     * Spotify Api url base
     */
    protected $baseUrl;

    /**
     * Construct method
     *
     * @param Buzz\Browser  $buzz    Buzz service instance
     * @param SpotifyMapper $mapper  Mapper intance
     * @param string        $baseUrl Base url from api
     */
    public function __construct(Browser $buzz, SpotifyMapper $mapper, $baseUrl)
    {
        $this->buzz = $buzz;
        $this->mapper = $mapper;
        $this->baseUrl = $baseUrl;
    }

    /**
     * Normalize query for request
     *
     * @param String $query Query
     *
     * @return string Query normalized
     */
    protected function normalizeQuery($query)
    {
        if (is_array($query)) {

            $query = implode(' ', $query);
        }

        return rawurlencode(trim($query));
    }

    /**
     * Given a url, process it and return found results
     *
     * @param string $url Url to process
     *
     * @return mixed Results
     */
    protected function get($url)
    {
        $request = $this->buzz->get($url, array(
            'Accept'    =>  'application/json'
        ));

        $requestStatusCode = $this->getMessageFromCode($request->getStatusCode());
        if (200 === $requestStatusCode['code']) {
            if (parse_url($url, PHP_URL_PATH) == "/v1/search") {
                parse_str(parse_url($url, PHP_URL_QUERY), $queryParameters);
                $responseType = $queryParameters["type"]."s";
                $foundItems = json_decode($request->getContent(), true)[$responseType]["items"];
                $entities = [];
                foreach ($foundItems as $item) {
                    $entity = $this->mapper->map($item);
                    $entities[] = $entity;
                }
                return $entities;
            }
            return $this->mapper->map(json_decode($request->getContent(), true));
        }

        return $requestStatusCode;
    }

    /**
     * Given a Response code, return custom Spotify message
     *
     * @param Integer $code Code of the Reponse
     *
     * @return Array Response return information
     */
    private function getMessageFromCode($code)
    {
        switch ($code) {

            case 200:
                $message = 'OK';
                $longMessage = 'The request was successfully processed.';
                break;

            case 304:
                $message = 'Not Modified';
                $longMessage = 'The data hasn’t changed since your last request. See Caching.';
                break;

            case 400:
                $message = 'Bad Request';
                $longMessage = 'The request was not understood. Used for example when a required parameter was omitted.';
                break;

            case 403:
                $message = 'Forbidden';
                $longMessage = 'The rate limiting has kicked in.';
                break;

            case 404:
                $message = 'Not Found';
                $longMessage = 'The requested resource was not found. Also used if a format is requested using the url and the format isn’t available.';
                break;

            case 406:
                $message = 'Not Acceptable';
                $longMessage = 'The requested format isn’t available.';
                break;

            case 500:
                $message = 'Internal Server Error';
                $longMessage = 'The server encountered an unexpected problem. Should not happen.';
                break;

            case 503:
                $message = 'Service Unavailable';
                $longMessage = 'The API is temporarily unavailable.';
                break;

            default :
                $message = '';
                $longMessage = '';
                break;
        }

        return array(

            'code'          =>  $code,
            'message'       =>  $message,
            'longmessage'   =>  $longMessage,
        );
    }
}
