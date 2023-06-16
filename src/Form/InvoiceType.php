<?php

namespace App\Form;

use App\Entity\Invoice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('invoice_date', DateTimeType::class, [
                'widget' => 'single_text',
                'attr' => ['type' => 'date', 'class' => 'form-control', 'readonly' => true], // Set 'type' to 'date'
                'html5' => true,
                'data' => new \DateTime(),
            ])
            ->add('invoice_number')
            ->add('customer_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
