<?php

namespace OpenSkool\LocalityBundle\Admin;

use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class LocalityAdmin extends Admin
{
//    protected $baseRoutePattern = 'system/localities';

    public function getBaseRoutePattern()
    {
        if ($this->isChild()) { // the admin class is a child, prefix it with the parent route name
//            var_dump("SI");
            return sprintf('%s/{id}/localities', $this->getParent()->getBaseRoutePattern());
        }

        return 'system/localities';
    }


    public function getParentAssociationMapping()
    {
        return 'country';
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('code')
            ->add('name')
            ->add('country');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('code')
            ->add('name')
            ->add('country')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('code')
            ->add('name')//            ->add('country')
        ;

        if (!$this->isChild()) {
            $formMapper->add('country', 'sonata_type_model_list', array()/*, array('edit' => 'list')*/);
        }

    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('code')
            ->add('name')
            ->add('country');
    }

    protected function configureTabMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && in_array($action, array('edit'))) {
            $localityAdmin = $this->isChild() ? $this->getParent() : $this;

            $id = $localityAdmin->getRequest()->get('id');

            $menu->addChild('Ciudades', array(
                'uri' => $localityAdmin->generateUrl('open_skool_locality.admin.city.list', array('id' => $id))
            ));
        }
    }


}
