<?php

declare(strict_types=1);

namespace App\UserInterface\Web\Controller;

use App\Application\Command\Product\CreateProductCommand;
use App\UserInterface\Form\CategoryType;
use Prooph\ServiceBus\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ProductController extends AbstractController
{
    public function add(CommandBus $commandBus, Request $request): Response
    {
        $form = $this->createForm(CategoryType::class, []);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $command = new CreateProductCommand($form->getData());
            $commandBus->dispatch($command);
        }

        return $this->render('product/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
