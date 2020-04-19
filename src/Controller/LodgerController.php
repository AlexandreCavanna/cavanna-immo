<?php

namespace App\Controller;

use App\Entity\Lodger;
use App\Form\LodgerType;
use App\Repository\LodgerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/lodger")
 */
class LodgerController extends AbstractController
{
    /**
     * @Route("/", name="lodger_index", methods={"GET"})
     */
    public function index(LodgerRepository $lodgerRepository): Response
    {
        return $this->render('lodger/index.html.twig', [
            'lodgers' => $lodgerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lodger_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lodger = new Lodger();
        $form = $this->createForm(LodgerType::class, $lodger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lodger);
            $entityManager->flush();

            return $this->redirectToRoute('lodger_index');
        }

        return $this->render('lodger/new.html.twig', [
            'lodger' => $lodger,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lodger_show", methods={"GET"})
     */
    public function show(Lodger $lodger): Response
    {
        return $this->render('lodger/show.html.twig', [
            'lodger' => $lodger,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lodger_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lodger $lodger): Response
    {
        $form = $this->createForm(LodgerType::class, $lodger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lodger_index');
        }

        return $this->render('lodger/edit.html.twig', [
            'lodger' => $lodger,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lodger_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lodger $lodger): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lodger->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lodger);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lodger_index');
    }
}
