<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options){
		$builder->add('name', TextType::class, array(
			'label' => 'Nombre'
		))
		->add('lastname', TextType::class, array(
			'label' => 'Apellidos'
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
		->add('comments', TextType::class, array(
			'label' => 'Comentarios'
		))
		->add('submit', SubmitType::class, array(
			'label' => 'Enviar'
		));
	}
}