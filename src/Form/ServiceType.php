<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\ServiceCategory;

class ServiceType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options){

		$builder->add('description', TextType::class, array(
			'label' => 'Nombre del servicio'
		))
		->add('provider', TextType::class, array(
			'label' => 'Proveedor'
		))
		->add('price', NumberType::class, array(
			'label' => 'Precio'
		))
		->add('submit', SubmitType::class, array(
			'label' => 'Guardar'
		));

	}
}