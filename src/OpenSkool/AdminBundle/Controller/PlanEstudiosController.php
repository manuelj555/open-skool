<?php

namespace OpenSkool\AdminBundle\Controller;

use OpenSkool\AdminBundle\Entity\EtapaPlanEstudios;
use OpenSkool\AdminBundle\Entity\PlanEstudios;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanEstudiosController extends CRUDController
{
    public function configureAction(PlanEstudios $planEstudios)
    {
        $etapas = $this->getDoctrine()
            ->getRepository('OpenSkoolAdminBundle:EtapaPlanEstudios')
            ->getEtapasPorPlanEstudios($planEstudios->getId());


        return $this->render('@OpenSkoolAdmin/PlanEstudios/configure.html.twig', array(
            'action' => 'configure',
            'object' => $planEstudios,
            'etapas' => $etapas,
        ));
    }

    public function ordenarEtapasAction(Request $request)
    {
//        var_dump($request->get('orden-etapas', array()));die;

        $this->getDoctrine()
            ->getRepository('OpenSkoolAdminBundle:EtapaPlanEstudios')
            ->ordenarEtapas($request->get('orden-etapas', array()));

        return new Response('Ok');
    }

    public function addEtapaAction(Request $request, PlanEstudios $planEstudios)
    {
        $form = $this->createFormBuilder()
            ->add('etapa', 'entity', array(
                'class' => 'OpenSkoolAdminBundle:Etapa',
            ))
            ->add('save', 'submit', array('label' => 'Agregar'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()
                ->getManager()
                ->getRepository('OpenSkoolAdminBundle:EtapaPlanEstudios')
                ->crearEtapaPlanEstudios($planEstudios->getId()
                    , $form['etapa']->getData()->getId());

            return $this->configureAction($planEstudios);
//            return $this->redirect($this->admin->generateObjectUrl('configure', $planEstudios));
        }

        $view = $form->createView();
        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        return $this->render('@OpenSkoolAdmin/PlanEstudios/add_etapa.html.twig', array(
//        return $this->render('SonataAdminBundle:CRUD:edit.html.twig', array(
            'form' => $view,
            'action' => 'add_etapa',
            'object' => $planEstudios,
        ));
    }

    public function cambiarStatusEtapaAction(PlanEstudios $planEstudios, $etapa, $active = 1)
    {
        $this->getDoctrine()
            ->getManager()
            ->getRepository('OpenSkoolAdminBundle:EtapaPlanEstudios')
            ->activarEtapa($etapa, $active);

        return $this->configureAction($planEstudios);
//        return $this->redirect($this->admin->generateObjectUrl('configure', $planEstudios));
    }

    public function eliminarEtapaAction(PlanEstudios $planEstudios, $etapa)
    {
        $this->getDoctrine()
            ->getManager()
            ->getRepository('OpenSkoolAdminBundle:EtapaPlanEstudios')
            ->eliminarEtapa($etapa);

        return $this->configureAction($planEstudios);
//        return $this->redirect($this->admin->generateObjectUrl('configure', $planEstudios));
    }
}
