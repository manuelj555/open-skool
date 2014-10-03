<?php
/**
 * 03/10/2014
 * open-skool
 */

namespace OpenSkool\AdminBundle\Twig\Extension;

/**
 * @autor Manuel Aguirre <programador.manuel@gmail.com>
 */
class BootstrapExtension extends \Twig_Extension
{

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'openskool_boostrap';
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('bs_icon', array($this, 'icon'), array('is_safe' => array('html'))),
        );
    }

    public function icon($type)
    {
        if ($type) {
            return '<i class="glyphicon glyphicon-' . $type . '"></i>';
        }
    }


}