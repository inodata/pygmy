<?php

namespace Inodata\PromoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PromocodeAdmin extends Admin
{
	//TODO: verificar el componente de doble lista para la asignación de token
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->add('confirmation_token')
			//->add('promo', 'sonata_type_collection', array('required' => true))
			->add('is_valid', null, array('required'=>false))
		;
	}

	protected function configureDataGridFilters(DatagridMapper $dataGridMapper)
	{
		$dataGridMapper
			->add('confirmation_token')
			//->add('promo')
			->add('is_valid')
		;
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('confirmation_token')
			//->add('promo')
			->add('is_valid')
		;
	}
}