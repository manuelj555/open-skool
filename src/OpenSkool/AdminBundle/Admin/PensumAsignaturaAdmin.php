<?php

namespace OpenSkool\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PensumAsignaturaAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('codigo')
            ->add('codigoCurricular')
            ->add('electiva')
            ->add('unidadesCredito')
            ->add('horasTeoricas')
            ->add('horasPracticas')
            ->add('pensum')
            ->add('asignatura')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('codigo')
            ->add('codigoCurricular')
            ->add('electiva', null, array('editable' => true))
            ->add('unidadesCredito')
            ->add('horasTeoricas')
            ->add('horasPracticas')
            ->add('pensum')
            ->add('asignatura')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('codigo')
            ->add('codigoCurricular')
            ->add('electiva')
            ->add('unidadesCredito')
            ->add('horasTeoricas')
            ->add('horasPracticas')
            ->add('pensum')
            ->add('asignatura')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('codigo')
            ->add('codigoCurricular')
            ->add('electiva')
            ->add('unidadesCredito')
            ->add('horasTeoricas')
            ->add('horasPracticas')
            ->add('pensum')
            ->add('asignatura')
        ;
    }
}
