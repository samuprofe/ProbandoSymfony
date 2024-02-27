<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Categoria;
use App\Entity\Articulo;

class CategoriaController extends AbstractController
{
    #[Route('/', name: 'categorias')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $categorias = $entityManager->getRepository(Categoria::class)->findAll();
        return $this->render('categoria/index.html.twig', [
            'categorias' => $categorias,
        ]);
    }

    
}
