<?php

namespace App\Form;

use App\Entity\Vente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ValidationReserveType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
    ->add('valid', SubmitType::class, [
    'attr' => ['class' => 'valid']])
    ->add('cancel', SubmitType::class, [
    'attr' => ['class' => 'cancel']]);
  }
}
