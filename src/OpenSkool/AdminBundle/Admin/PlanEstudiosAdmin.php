<?php

namespace OpenSkool\AdminBundle\Admin;

use Knp\Menu\ItemInterface as MenuItemInterface;
use OpenSkool\AdminBundle\Entity\Repository\EtapaPlanEstudiosRepository;
use OpenSkool\AdminBundle\Form\EtapaPlanExtudiosType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class PlanEstudiosAdmin extends Admin
{
    /**
     * @var EtapaPlanEstudiosRepository
     */
    protected $etapaPlanEstudiosRepository;

    /**
     * @param EtapaPlanEstudiosRepository $etapaPlanEstudiosRepository
     */
    public function setEtapaPlanEstudiosRepository($etapaPlanEstudiosRepository)
    {
        $this->etapaPlanEstudiosRepository = $etapaPlanEstudiosRepository;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('configure', $this->getRouterIdParameter() . '/configure');
        $collection->add('ordenar_etapas', $this->getRouterIdParameter() . '/etapas/reordenar', array(
            '_controller' => $this->getBaseControllerName() . ':ordenarEtapas',
        ));
        $collection->add('add_etapa', $this->getRouterIdParameter() . '/etapas/add', array(
            '_controller' => $this->getBaseControllerName() . ':addEtapa',
        ));
        $collection->add('activar_etapa', $this->getRouterIdParameter() . '/etapas/{etapa}/activate/{active}', array(
            '_controller' => $this->getBaseControllerName() . ':cambiarStatusEtapa',
        ));
        $collection->add('eliminar_etapa', $this->getRouterIdParameter() . '/etapas/{etapa}/eliminar', array(
            '_controller' => $this->getBaseControllerName() . ':eliminarEtapa',
        ));
    }


    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('codigo')
            ->add('descripcion');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('codigo')
            ->add('descripcion')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                    'configure' => array(
                        'template' => 'OpenSkoolAdminBundle:CRUD:list_action.html.twig',
                        'hola' => 'Mauel',
                    ),
                )
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
//        $etapas = $this->etapaPlanEstudiosRepository
//            ->getEtapasPorPlanEstudios($this->getSubject()->getId());
        $formMapper
            ->tab('Info')
            ->with('', array('collapsed' => true))
            ->add('codigo')
            ->add('descripcion')
            ->end()
            ->end()
            ->tab('Etapas')
            ->with(null)
//            ->add('etapas', 'collection', array(
//                'type' => new EtapaPlanExtudiosType(),
//                'mapped' => false,
//                'data' => $etapas,
//                'allow_add' => true,
//                'allow_delete' => true,
//            ))
            ->end()
            ->end()
            ->tab('Grupos')
            ->end();
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('codigo')
            ->add('descripcion');
    }

    protected function configureTabMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {

//        switch ($action) {
//            case 'configure':
//
//                $id = $this->getRequest()->get('id');
//
//                $menu->addChild('Edición', array(
//                    'uri' => $this->generateUrl('edit', array('id' => $id)),
//                ));
//
//                break;
//        }
    }


}
