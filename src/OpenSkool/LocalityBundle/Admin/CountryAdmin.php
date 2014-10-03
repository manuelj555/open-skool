<?php

namespace OpenSkool\LocalityBundle\Admin;

use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class CountryAdmin extends Admin
{
    protected $baseRoutePattern = 'system/countries';

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('name')
            ->add('code');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $actions = array(
            'show' => array(),
            'edit' => array(),
            'mi_action' => array(
                'template' => 'OpenSkoolLocalityBundle:Country:list_action_localities.html.twig',
            ),
            'delete' => array(),
        );


        $listMapper
            ->add('id')
            ->add('name')
            ->add('code')
            ->add('localities')
            ->add('_action', 'actions', array(
                'actions' => $actions,
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected
    function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('id')
//            ->tab('Info Básica')
            ->add('code')
            ->add('name')
            ->end()
//            ->end()
//            ->tab('Localidades')
//                ->add('localities', 'sonata_type_collection', array(
//                    'by_reference' => false,
//                ), array(
//                    'edit' => 'standard',
//                    'inline' => 'table',
//                ))
//            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected
    function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('name')
            ->add('code');
    }

    protected
    function configureTabMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && in_array($action, array('edit'))) {
            $countryAdmin = $this->isChild() ? $this->getParent() : $this;

            $id = $countryAdmin->getRequest()->get('id');

            $menu->addChild('Localidades', array(
                'uri' => $countryAdmin->generateUrl('open_skool_locality.admin.locality.list', array('id' => $id))
            ));
        }
    }


}
