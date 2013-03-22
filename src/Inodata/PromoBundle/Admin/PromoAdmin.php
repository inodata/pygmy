<?php

namespace Inodata\PromoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PromoAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->add('name')
			->add('filename', null, array('help'=>'Escribe el nombre exacto del archivo creado.'))
		;
	}

	protected function configureDataGridFilters(DatagridMapper $dataGridMapper)
	{
		$dataGridMapper
			->add('name')
			->add('filename')
		;
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('name')
			->add('filename')
		;
	}
}