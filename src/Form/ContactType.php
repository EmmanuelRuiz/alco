<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options){
		$builder->add('name', TextType::class, array(
			'label' => 'Nombre'
		))
		->add('lastname', TextType::class, array(
			'label' => 'Apellido'
		))
		->add('email', EmailType::class, array(
			'label' => 'Correo electrónico'
		))
		->add('phone', NumberType::class, array(
			'label' => 'Teléfono'
		))
		->add('city', TextType::class, array(
			'label' => 'Ciudad'
		))
		->add('message', TextareaType::class, array(
			'label' => 'Mensaje'
		))
		->add('submit', SubmitType::class, array(
			'label' => 'Enviar',
			'attr' => array(
				'class' => 'btn btn-style-5'
			)
		));
	}
}