<?php

namespace App;

use GuzzleHttp;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GuzzleClient
 * @description Class wrapper for making request to the API backend
 * @package App\GuzzleClient
 * @author Héctor Martín Solís
 */
class GuzzleClient
{

    protected static $instance = null;
    protected static $instance_with_proxy = null;

    public function __construct()
    {
        self::$instance = new GuzzleHttp\Client();
    }

    public function getClient()
    {
        return self::$instance;
    }

    /**
     * It makes a get request to the url provided
     * @return string json if action is carried out proprely
     * @param url,  string that contains the url of the server to be consumed
     * @return string
     * @throws Exception
     */
    public function get($url, $headers = [])
    {
        try {

            $response =  $this->getClient()->get($url, $headers);

            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            throw new \Exception("Guzzle has failed on request GET", Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * It makes a curl post request to post against the url provided
     * @todo Test
     * @return string json if action is carried out proprely
     * @param url,  string that contains the url of the server to be consumed
     * @param params, array associative containing the data to be posted
     * @throws Exception
     *
     */
    public function post($url, $params, $headers = ['Content-Type' => 'application/json'], $auth = null)
    {
        try {

            $options = ['headers' => $headers, 'json' => $params];

            if (isset($options['headers']['Content-Type']) && $options['headers']['Content-Type'] !== 'application/json') {
                $options['form_params'] = $params;
                unset($options['json']);
            }

            if ($auth) {
                $options['auth'] = $auth;
            }

            $response = $this->getClient()->post($url, $options);
            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            throw new \Exception("Guzzle has failed on request POST. Error: " . $e->getMessage() . " -- " . $e->getCode(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * It makes a curl post request to post against the url provided
     * @todo Test
     * @return string json if action is carried out proprely
     * @param url,  string that contains the url of the server to be consumed
     * @param params, array associative containing the data to be posted
     * @throws Exception
     *
     */
    public function postFullResponse($url, $params, $headers = ['Content-Type' => 'application/json'], $auth = null)
    {
        try {

            $options = ['headers' => $headers, 'json' => $params];

            if (isset($options['headers']['Content-Type']) && $options['headers']['Content-Type'] !== 'application/json') {
                $options['form_params'] = $params;
                unset($options['json']);
            }

            if ($auth) {
                $options['auth'] = $auth;
            }

            $response = $this->getClient()->post($url, $options);
            return [
                'headers' => $response->getHeaders(),
                'body'    => $response->getBody()->getContents()
            ];
        } catch (\Exception $e) {
            throw new \Exception("Guzzle has failed on request postFullResponse. Error: " . $e->getMessage() . " -- " . $e->getCode(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * It makes a delete request against the url provided
     * @return string json if action is carried out properly
     * @param $url, string that contains the url of the server to be consumed
     * @throws Exception
     *
     * @param type $url
     */

    public function delete($url, $params, $headers = ['Content-Type' => 'application/json'])
    {
        try {
            $response = $this->getClient()->delete($url, ['headers' => $headers, 'json' => $params]);
            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            throw new \Exception("Guzzle has failed on request DELETE", Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * It makes a delete request against the url provided
     *
     * @return string json if action is carried out properly
     * @param $url, string that contains the url of the server to be consumed
     * @param $params, array associative to be imported
     * @throws Exception
     *
     * @param type $url
     */

    public function put($url, $params, $headers = ['Content-Type' => 'application/json'])
    {
        try {
            $response = $this->getClient()->delete($url, ['headers' => $headers, 'json' => $params]);
            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            throw new \Exception("Guzzle has failed on request PUT", Response::HTTP_BAD_REQUEST);
        }
    }
}
