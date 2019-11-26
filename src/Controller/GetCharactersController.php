<?php

namespace App\Controller;

use App\StarWarsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetCharactersController extends AbstractController
{

    protected $starWarsService = null;

    public function __construct(StarWarsService $sws)
    {
        $this->starWarsService = $sws;
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     * 
     * @Route("/get/characters", name="get_characters", )
     */
    public function index(Request $request)
    {
        try {

            $page = (int) ($request->get("page") ?? 1);
            $noCache = $request->get("noCache") && $request->get("noCache") == true ?: false;

            if ($page < 1)
                throw new \Exception("Page number must be greater than 1", Response::HTTP_BAD_REQUEST);

            $this->starWarsService->setCacheUsage(!$noCache);

            return new JsonResponse([
                'status' => Response::HTTP_OK,
                'message' => $this->starWarsService->getPeople($page)
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            return new JsonResponse([
                'status' => $e->getCode(),
                'message' => $e->getMessage(),
            ], $e->getCode());
        }
    }
}
