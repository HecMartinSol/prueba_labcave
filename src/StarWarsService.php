<?php

namespace App;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
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
    protected $useCache = null;
    protected $cache = null;

    const API_ENDPOINT = "https://swapi.co/api";
    const MINS_TO_EXPIRE_CACHE = 5;
    
    public function __construct(GuzzleClient $guzzle)
    {
        $this->useCache = true;
        $this->guzzle = $guzzle;
        $this->cache = new FilesystemAdapter();
    }

    /**
     * Sets the use of cache in the service
     *
     * @param boolean $useCache
     * @return void
     */
    public function setCacheUsage(bool $useCache = true)
    {
        $this->useCache = $useCache;
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
            
            $cacheTag = "starwars.getPeople.{$page}";
            $cachedRes = $this->cache->getItem($cacheTag);
            #   If not using cache or the value is not already cached...
            if(!$this->useCache || !$cachedRes->isHit()){
                $res = $this->guzzle->get(self::API_ENDPOINT . "/people/?page=".$page);
                
                $cachedRes->set($res);
                $cachedRes->expiresAfter(self::MINS_TO_EXPIRE_CACHE * 60);

                $this->cache->save($cachedRes);
            } else {
                $res = $cachedRes->get();
            }

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
            
            $cacheTag = "starwars.getFilms.{$page}";
            $cachedRes = $this->cache->getItem($cacheTag);
            #   If not using cache or the value is not already cached...
            if(!$this->useCache || !$cachedRes->isHit()){
                $res = $this->guzzle->get(self::API_ENDPOINT . "/films/?page=".$page);
                
                $cachedRes->set($res);
                $cachedRes->expiresAfter(self::MINS_TO_EXPIRE_CACHE * 60);

                $this->cache->save($cachedRes);
            } else {
                $res = $cachedRes->get();
            }
            
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
            
            $cacheTag = "starwars.getPlanets.{$page}";
            $cachedRes = $this->cache->getItem($cacheTag);
            #   If not using cache or the value is not already cached...
            if(!$this->useCache || !$cachedRes->isHit()){
                $res = $this->guzzle->get(self::API_ENDPOINT . "/planets/?page=".$page);
                
                $cachedRes->set($res);
                $cachedRes->expiresAfter(self::MINS_TO_EXPIRE_CACHE * 60);

                $this->cache->save($cachedRes);
            } else {
                $res = $cachedRes->get();
            }
            
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
            
            $cacheTag = "starwars.getSpecies.{$page}";
            $cachedRes = $this->cache->getItem($cacheTag);
            #   If not using cache or the value is not already cached...
            if(!$this->useCache || !$cachedRes->isHit()){
                $res = $this->guzzle->get(self::API_ENDPOINT . "/species/?page=".$page);
                
                $cachedRes->set($res);
                $cachedRes->expiresAfter(self::MINS_TO_EXPIRE_CACHE * 60);

                $this->cache->save($cachedRes);
            } else {
                $res = $cachedRes->get();
            }
            
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
            
            $cacheTag = "starwars.getStarships.{$page}";
            $cachedRes = $this->cache->getItem($cacheTag);
            #   If not using cache or the value is not already cached...
            if(!$this->useCache || !$cachedRes->isHit()){
                $res = $this->guzzle->get(self::API_ENDPOINT . "/starships/?page=".$page);
                
                $cachedRes->set($res);
                $cachedRes->expiresAfter(self::MINS_TO_EXPIRE_CACHE * 60);

                $this->cache->save($cachedRes);
            } else {
                $res = $cachedRes->get();
            }
            
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
            
            $cacheTag = "starwars.getVehicles.{$page}";
            $cachedRes = $this->cache->getItem($cacheTag);
            #   If not using cache or the value is not already cached...
            if(!$this->useCache || !$cachedRes->isHit()){
                $res = $this->guzzle->get(self::API_ENDPOINT . "/vehicles/?page=".$page);
                
                $cachedRes->set($res);
                $cachedRes->expiresAfter(self::MINS_TO_EXPIRE_CACHE * 60);

                $this->cache->save($cachedRes);
            } else {
                $res = $cachedRes->get();
            }
            
            return json_decode($res);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }        
    }



}