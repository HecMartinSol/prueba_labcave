<?php

namespace App;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class StarWarsService
 * @description Service Class to request different endpoints of the API https://swapi.co/
 * @package App\StarWarsService
 * @author Héctor Martín Solís
 */
class StarWarsService
{   
    protected $guzzle = null;

    const API_ENDPOINT = "https://swapi.co/api";
    
    public function __construct(GuzzleClient $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    /**
     * Retrieves info of a specific page of the api endpoint for PEOPLE
     *
     * @param integer $page
     * @return StdClass
     * @throws Exception
     */
    public function getPeople(int $page = 1)
    {
        try {
            if($page < 1)
                throw new Exception("Page number must be greater than 1", Response::HTTP_BAD_REQUEST);
                
            $res = $this->guzzle->get(self::API_ENDPOINT . "/people/?page=".$page);

            return json_decode($res);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Retrieves info of a specific page of the api endpoint for FILMS
     *
     * @param integer $page
     * @return StdClass
     * @throws Exception
     */
    public function getFilms(int $page = 1)
    {
        try {
            
            if($page < 1)
                throw new Exception("Page number must be greater than 1", Response::HTTP_BAD_REQUEST);
                
            $res = $this->guzzle->get(self::API_ENDPOINT . "/films/?page=".$page);
            
            return json_decode($res);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }        
    }

    /**
     * Retrieves info of a specific page of the api endpoint for PLANETS
     *
     * @param integer $page
     * @return StdClass
     * @throws Exception
     */
    public function getPlanets(int $page = 1)
    {
        try {
            
            if($page < 1)
                throw new Exception("Page number must be greater than 1", Response::HTTP_BAD_REQUEST);
                
            $res = $this->guzzle->get(self::API_ENDPOINT . "/planets/?page=".$page);
            
            return json_decode($res);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }        
    }

    /**
     * Retrieves info of a specific page of the api endpoint for SPECIES
     *
     * @param integer $page
     * @return StdClass
     * @throws Exception
     */
    public function getSpecies(int $page = 1)
    {
        try {
            
            if($page < 1)
                throw new Exception("Page number must be greater than 1", Response::HTTP_BAD_REQUEST);
                
            $res = $this->guzzle->get(self::API_ENDPOINT . "/species/?page=".$page);
            
            return json_decode($res);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }        
    }

    /**
     * Retrieves info of a specific page of the api endpoint for STARSHIPS
     *
     * @param integer $page
     * @return StdClass
     * @throws Exception
     */
    public function getStarships(int $page = 1)
    {
        try {
            
            if($page < 1)
                throw new Exception("Page number must be greater than 1", Response::HTTP_BAD_REQUEST);
                
            $res = $this->guzzle->get(self::API_ENDPOINT . "/starships/?page=".$page);
            
            return json_decode($res);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }        
    }

    /**
     * Retrieves info of a specific page of the api endpoint for VEHICLES
     *
     * @param integer $page
     * @return StdClass
     * @throws Exception
     */
    public function getVehicles(int $page = 1)
    {
        try {
            
            if($page < 1)
                throw new Exception("Page number must be greater than 1", Response::HTTP_BAD_REQUEST);
                
            $res = $this->guzzle->get(self::API_ENDPOINT . "/vehicles/?page=".$page);
            
            return json_decode($res);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }        
    }



}