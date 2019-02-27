<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CategoryType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options){
		$builder->add('serviceCategoryName', TextType::class, array(
			'label' => 'Nombrem de la categoría'
		))
		->add('submit', SubmitType::class, array(
			'label' => 'Guardar'
		));
	}
}