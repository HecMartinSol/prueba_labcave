<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CharacterViewerController extends AbstractController
{
    /**
     * @Route("/character/viewer", name="character_viewer")
     */
    public function index()
    {
        return $this->render('character_viewer.html.twig');
    }
}
