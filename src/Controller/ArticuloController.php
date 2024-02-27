<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Articulo;
use App\Entity\Categoria;
use Doctrine\ORM\EntityManagerInterface;

class ArticuloController extends AbstractController
{
    #[Route('/articulos/{id}', name: 'verArticulo')]
    public function verArticulo(Articulo $articulo): Response
    {
        return $this->render('articulo/verArticulo.html.twig', [
            'articulo' => $articulo
        ]);
    }

    #[Route('/articulos', name: 'verTodosArticulos')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $articulos = $entityManager->getRepository(Articulo::class)->findAll();

        return $this->render('articulo/index.html.twig', [
            'articulos' => $articulos
        ]);
    }

    #[Route('/articulos/categoria/{id}', name: 'verArticulosPorCategoria')]
    public function verArticulosPorCategoria(Categoria $categoria): Response
    {
        return $this->render('articulo/verArticulosPorCategoria.html.twig', [
            'categoria' => $categoria
        ]);
    }
}
