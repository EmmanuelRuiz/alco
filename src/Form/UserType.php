<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options){

		$builder->add('clientName', TextType::class, array(
			'label' => 'Nombre'
		))
		->add('clientEmail', EmailType::class, array(
			'label' => 'Correo electrónico'
		))
		->add('clientPhone', NumberType::class, array(
			'label' => 'Teléfono'
		))
		->add('location', ChoiceType::class, array(
			'label' => 'Lugar',
			'choices' => array(
				'Playa del Carmen' => 'Playa del Carmen',
				'Cancún' => 'Cancún',
				'Tulúm' => 'Tulúm'
			)
		))
		->add('comments', TextareaType::class, array(
			'label' => 'Comentarios'
		))
		->add('submit', SubmitType::class, array(
			'label' => 'Guardar'
		));

	}
}