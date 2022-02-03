<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Benjamin Manguet <benjamin.manguet@negocian.fr>
 *
 * @Route("/", name="index")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("", name="")
     *
     * @param KernelInterface $kernel
     *
     * @return Response
     */
    public function index(KernelInterface $kernel): Response
    {
        $readMeFile = $kernel->getProjectDir() . '/README.md';

        return $this->render('index.html.twig', [
            'readmeFile' => file_get_contents($readMeFile),
        ]);
    }

    /**
     * @Route("algorithme", name="_algo")
     *
     * @return Response
     */
    public function algo(): Response
    {
        return $this->render('algo.html.twig');
    }
}