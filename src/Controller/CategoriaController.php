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

    #[Route('/categoria/add', name: 'addCategoria')]
    public function addCategoria(EntityManagerInterface $entityManager): Response
    {
        $categoria =new Categoria();
        $categoria->setNombre('Televisiones');
        $categoria->setDescripcion('Las mejores televisiones y más baratas');

        $entityManager->persist($categoria);
        $entityManager->flush();

        return $this->redirectToRoute('categorias');
        
    }

    #[Route('/categoria/delete/{id}', name: 'deleteCategoria')]
    public function deleteCategoria(Categoria $categoria, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($categoria);
        $entityManager->flush();

        return $this->redirectToRoute('categorias');
        
    }
 
}
