<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\InvoiceRepository;
use App\Form\InvoiceType;
use App\Entity\Invoice;


class InvoiceController extends AbstractController
{
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function index(): Response
    {
        $invoices = $this->invoiceRepository->findAll();
        return $this->render('invoice/index.html.twig', [
            'invoices' => $invoices,
        ]);
    }
    
    public function create(Request $request): Response
    {
        $invoice = new Invoice();
        $form = $this->createForm(InvoiceType::class, $invoice);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($invoice);
            $entityManager->flush();

            return $this->redirectToRoute('invoice_show', ['id' => $invoice->getId()]);
        }

        return $this->render('invoice/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function show(int $id): Response
    {
        $invoice = $this->invoiceRepository->find($id);

        if (!$invoice) {
            return $this->render('404.html.twig');
        }

        return $this->render('invoice/show.html.twig', [
            'invoice' => $invoice,
        ]);
    }

    public function delete(int $id)
    {
        $invoice = $this->invoiceRepository->find($id);

        if (!$invoice) {
            return $this->render('404.html.twig');
        }
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($invoice);
        $entityManager->flush();

        $this->addFlash('success', 'Invoice deleted successfully.');
        return $this->redirectToRoute('invoice_index');
    }

    public function default() 
    {
        return new JsonResponse(["message" => "welcome to this page"]);
    }
}
