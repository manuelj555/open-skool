<?php
/**
 * 02/10/2014
 * open-skool
 */

namespace OpenSkool\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


/**
 * @autor Manuel Aguirre <programador.manuel@gmail.com>
 */
class EtapaPlanExtudiosType extends AbstractType
{

    public function getName()
    {
        return 'etapa_plan_estudios';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('etapa');
//        $builder->add('orden');
//        $builder->add('activo');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OpenSkool\AdminBundle\Entity\EtapaPlanEstudios',
        ));
    }


}