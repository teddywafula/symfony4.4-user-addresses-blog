<?php

namespace App\Controller;

use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="app_category")
     */
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    /**
     * @Route("/category/create", name="app_create_category")
     */
    public function create(Request $request): Response
    {
        $form = $this->createForm(CategoryType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            return $this->redirectToRoute('app_category_success');
        }
        return $this->render('category/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("category/success", name="app_category_success")
     */
    public function success(): Response
    {
        return new Response("Success", Response::HTTP_OK);
    }
}
