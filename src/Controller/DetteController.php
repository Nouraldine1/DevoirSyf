<?php

namespace App\Controller;

use App\Entity\Dette;
use App\Form\DetteType;
use App\Repository\DetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetteController extends AbstractController
{
    /**
     * @Route("/dette", name="dette_index")
     */
    public function index(Request $request, DetteRepository $detteRepository): Response
    {
        $statusFilter = $request->query->get('status');
        $dettes = $detteRepository->findBy(['status' => $statusFilter]);

        return $this->render('dette/list.html.twig', [
            'dettes' => $dettes,
            'statusFilter' => $statusFilter,
        ]);
    }

    /**
     * @Route("/dette/new", name="dette_new")
     */
    public function new(Request $request): Response
    {
        $dette = new Dette();
        $form = $this->createForm(DetteType::class, $dette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dette);
            $entityManager->flush();

            return $this->redirectToRoute('dette_index');
        }

        return $this->render('dette/create.html.twig', [
            'dette' => $dette,
            'form' => $form->createView(),
        ]);
    }
}
