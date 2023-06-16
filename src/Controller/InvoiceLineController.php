<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\InvoiceLine;
use App\Form\InvoiceLineType;

class InvoiceLineController extends AbstractController
{
    public function create(Request $request): Response
    {
        $invoiceLine = new InvoiceLine();
        $invoiceLineForm = $this->createForm(InvoiceLineType::class, $invoiceLine);
        $invoiceLineForm->handleRequest($request);

        if ($invoiceLineForm->isSubmitted() && $invoiceLineForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($invoiceLine);
            $entityManager->flush();

            return $this->redirectToRoute('invoice_show', ['id' => (string) $invoiceLine->getInvoiceId()->getId()]);
        }

        return $this->render('invoice_line/new.html.twig', [
            'form' => $invoiceLineForm->createView(),
        ]);
    }
}
